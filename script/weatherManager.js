class weatherManager {
    constructor() {
        this.cachedData = null;
        this.latitude = 44.571944;
        this.longitude = 72.774444; // Coordinates for Smuggs
        this.proxyURL = `https://jwtaylor.w3.uvm.edu/SkiCam/api/weatherProxy.php?lat=${this.latitude}&long=${this.longitude}`;
        this.isFetching = false;
    }

    async fetchData() {
        if (this.isFetching) return; // Prevent duplicate fetches

        this.isFetching = true;
        try {
            const response = await fetch(this.proxyURL);

            this.cachedData = await response.json();
            // Display the data immediately after fetching
            this.displayData();
        } catch (error) {
            console.error("Error fetching weather data:", error);
        } finally {
            this.isFetching = false;
        }
    }

    displayData() {
        console.log("Weather data:", this.cachedData);
    }
}
