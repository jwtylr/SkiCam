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
            const boltonWeather = new weatherManager(44.420141, -72.847647); // Bolton coordinates

            // Fetch data
            await boltonWeather.fetchData();

            document.getElementById('temp').textContent = boltonWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = boltonWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = boltonWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = boltonWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = boltonWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = boltonWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>
    
    <h2>Info</h2>
    <h3>Address:</h3><body>4302 Bolton Valley Access Rd, Bolton Valley, VT 05477</body>
    <h3>Ski Patrol:</h3><body>(802) 434-6823</body>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6517.049673695023!2d-72.85092909867531!3d44.42024767237798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb59ac2a94c15e3%3A0x15e495118d4d1dbc!2sBolton%20Valley%20Resort!5e1!3m2!1sen!2sus!4v1766882460044!5m2!1sen!2sus" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>

    <h2>Resort Webcam</h2>
    <iframe width="560" 
            height="315" 
            src="https://www.youtube.com/embed/VX9ANOUYO1k?si=dUvH-xB_8rhJMfjr" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen></iframe>
    <iframe width="560" 
            height="315" 
            src="https://www.youtube.com/embed/xWdZHDUHjv8?si=7qq4NPhHwRn0dJxr" 
            title="YouTube video player" 
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen></iframe>
    <h2>Traffic Cameras</h2>
</body>
</html>