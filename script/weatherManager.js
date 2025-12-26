class weatherManager {
    constructor(latitude, longitude) {
        this.cachedData = null;
        this.latitude = latitude;
        this.longitude = longitude;
        this.proxyURL = `https://jwtaylor.w3.uvm.edu/SkiCam/api/weatherProxy.php?lat=${this.latitude}&long=${this.longitude}`;
        this.isFetching = false;

        this.temperature = null;
        this.apparentTemperature = null;
        this.snowfall = null;
        this.wind = null;
        this.cloudCover = null;
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
        console.log(JSON.parse(JSON.stringify(this.cachedData)));
    }
}
