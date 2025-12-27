<?php include '../top.php'; ?>

    <h1>Smuggs</h1>
    <h2>Weather</h2>
    <div id="weatherData">
        <p>Temperature: <span id="temp">--</span>°F</p>
        <p>Feels Like: <span id="apparent">--</span>°F</p>
        <p>Snowfall: <span id="snow">--</span> inches</p>
        <p>Wind Speed: <span id="wind">--</span> kn</p>
        <p>Wind Direction: <span id="windDir">--</span>°</p>
        <p>Cloud Cover: <span id="cloud">--</span>%</p>
    </div>

    <script src="/SkiCam/script/weatherManager.js"></script>
    <script>
        (async function () {
            const smuggsWeather = new weatherManager(44.571944, -72.81333);

            // Fetch data
            await smuggsWeather.fetchData();

            document.getElementById('temp').textContent = smuggsWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = smuggsWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = smuggsWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = smuggsWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = smuggsWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = smuggsWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>



    <h2>Info</h2>
    <h3>Address:</h3><body>4323 VT-108, Jeffersonville, VT 05464</body>

    <h2>Resort Webcam</h2>
    <iframe width="560" 
            height="315" 
            src="https://www.youtube.com/embed/HOhniNpNFZg?si=WEb-PvUBQ0tY4ogi" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen></iframe>
    <h2>Traffic Cameras</h2>
    <script src="/SkiCam/script/webcamManager.js"></script>
    <img id="webcam" alt="Traffic Camera">
    <script>
        const webcamManager = new WebcamManager();
        const webcamId = 'VT-108 Stowe';

        function updateWebcam(imageUrl) {
            const imgElement = document.getElementById('webcam');
            const timestampElement = document.getElementById('timestamp');
            
            if (imgElement.src.startsWith('blob:')) {
                URL.revokeObjectURL(imgElement.src);
            }
            imgElement.src = imageUrl;
            timestampElement.textContent = `Updated: ${new Date().toLocaleTimeString()}`;
        }

        const refreshInterval = webcamManager.startAutoRefresh(webcamId, updateWebcam);

        window.addEventListener('beforeunload', () => {
            clearInterval(refreshInterval);
        });
    </script>
    <caption>Note: this view is of the south side of VT-108 (Stowe); The north side is not available. It is not a through road.</caption>
</html>


