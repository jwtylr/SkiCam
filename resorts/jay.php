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
            const jayWeather = new weatherManager(44.929266, -72.515796); // Jay coordinates

            // Fetch data
            await jayWeather.fetchData();

            document.getElementById('temp').textContent = jayWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = jayWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = jayWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = jayWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = jayWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = jayWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>

    <h2>Info</h2>
    <h3>Address:</h3><body>830 Jay Peak Road, Jay, VT 05859</body>
    <h3>Ski Patrol:</h3><body>(802) 327-2187</body>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16491.218304682898!2d-72.51488847727774!3d44.93551398761821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb60f2f5c9f5d09%3A0x6bb602ed58bf4413!2sJay%20Peak%20Resort!5e1!3m2!1sen!2sus!4v1766887233568!5m2!1sen!2sus" 
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