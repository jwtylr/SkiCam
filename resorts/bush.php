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
            const bushWeather = new weatherManager(44.136471, -72.907464);

            // Fetch data
            await bushWeather.fetchData();

            document.getElementById('temp').textContent = bushWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = bushWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = bushWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = bushWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = bushWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = bushWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>

    <h2>Info</h2>
    <h3>Address:</h3><body>102 Forest Drive, Warren, VT 05674</body>
    <h3>Ski Patrol:</h3><body>(802) 583-6567</body>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28133.220266000353!2d-72.9023327195833!3d44.13893743630129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb56d7b952c28bb%3A0x78dc5cf31c15ff36!2sSugarbush%20Resort!5e1!3m2!1sen!2sus!4v1766886215644!5m2!1sen!2sus"
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    <h2>Resort Webcam</h2>
    <h2>Traffic Cameras</h2>
</body>
</html>