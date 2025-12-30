<?php include '../top.php'; ?>

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
            const stoweWeather = new weatherManager(44.531377, -72.802702); // Stowe coordinates

            // Fetch data
            await stoweWeather.fetchData();

            document.getElementById('temp').textContent = stoweWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = stoweWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = stoweWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = stoweWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = stoweWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = stoweWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>

    <h2>Info</h2>
    <h3>Address:</h3><body>5781 Mountain Rd, Stowe, VT 05672</body>
    <h3>Ski Patrol:</h3><body>(802) 644-1182</body>
    <h3>Map:</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7348.587175922529!2d-72.78720896563671!3d44.525972881169295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb5917b8faaea15%3A0xa2fbbf1f063d7b3d!2sStowe%20Mountain%20Resort!5e1!3m2!1sen!2sus!4v1766884179184!5m2!1sen!2sus" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    <h2>Resort Webcam</h2>

    <h2>Traffic Cameras</h2>
    <script src="/SkiCam/script/webcamManager.js"></script>
    <img id="webcam" alt="Traffic Camera">
    <script>
        const webcamManager = new WebcamManager();
        const webcamId = 'VT-108 Stowe';

        function updateWebcam(imageUrl) {
            const imgElement = document.getElementById('webcam');
            
            if (imgElement.src.startsWith('blob:')) {
                URL.revokeObjectURL(imgElement.src);
            }
            imgElement.src = imageUrl;

            console.log('Webcam updated.');
        }

        const refreshInterval = webcamManager.startAutoRefresh(webcamId, updateWebcam);

        window.addEventListener('beforeunload', () => {
            clearInterval(refreshInterval);
        });
    </script>
</body>
</html>