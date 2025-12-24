class WebcamManager {
    constructor() {
        this.cachedXML = null;
        this.lastFetch = null;
        this.cacheDuration = 10 * 60 * 1000; // 10 minutes (That's what the API refresh rate is)
        this.apiUrl = 'https://jwtaylor.w3.uvm.edu/SkiCam/api/webcamProxy.php'; // Silk proxy URL
        this.isFetching = false;
    }

    async getWebcamImage(webcamId) { // webcamId is a string depending on location of webcam
        // Fetch if no cache or cache expired
        if (!this.cachedXML || this.isCacheExpired()) {
            await this.fetchData();
        }

        return this.extractWebcamImage(webcamId);
    }

    isCacheExpired() {
        if (!this.lastFetch) return true;
        return (Date.now() - this.lastFetch) > this.cacheDuration;
    }

    async fetchData() {
        if (this.isFetching) return; // Prevent duplicate fetches
        
        this.isFetching = true;
        try {
            const response = await fetch(this.apiUrl);

            if (!response.ok) {
                throw new Error(`HTTP error ${response.status}`);
            }

            this.cachedXML = await response.text();
            this.lastFetch = Date.now();
            console.log('Webcam data fetched and cached');
        } catch (error) {
            console.error('Error fetching webcam data:', error);
        } finally {
            this.isFetching = false;
        }
    }

    extractWebcamImage(webcamId) {
        if (!this.cachedXML) return null;

        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(this.cachedXML, 'text/xml');

        // Select specific webcam by id
        const webcamElement = xmlDoc.querySelector(`cctvSnapshot[id="${webcamId}"]`);
        
        if (!webcamElement) {
            console.error(`Webcam ${webcamId} not found`);
            return null;
        }

        // Extract the base64 image data (adjust tag name as needed)
        const snippetElement = webcamElement.querySelector('snippet');
        if (!snippetElement) return null;

        const base64String = snippetElement.textContent.trim().replace(/\s/g, '');
        
        return this.base64ToImageUrl(base64String);
    }

    base64ToImageUrl(base64String) {
        try {
            const binaryString = atob(base64String);
            const bytes = new Uint8Array(binaryString.length);
            for (let i = 0; i < binaryString.length; i++) {
                bytes[i] = binaryString.charCodeAt(i);
            }
            
            const blob = new Blob([bytes], { type: 'image/jpeg' });
            return URL.createObjectURL(blob);
        } catch (error) {
            console.error('Error decoding base64:', error);
            return null;
        }
    }

    // Auto-refresh method
    startAutoRefresh(webcamId, updateCallback) {
        const refresh = async () => {
            await this.fetchData();
            const imageUrl = this.extractWebcamImage(webcamId);
            if (imageUrl) {
                updateCallback(imageUrl);
            }
        };

        refresh();
        return setInterval(refresh, this.cacheDuration);
    }
}