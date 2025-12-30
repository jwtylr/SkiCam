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
            const kmartWeather = new weatherManager(43.613689, -72.806429); // Kmart coordinates

            // Fetch data
            await kmartWeather.fetchData();

            document.getElementById('temp').textContent = kmartWeather.temperature ?? '--';
            document.getElementById('apparent').textContent = kmartWeather.apparentTemperature ?? '--';
            document.getElementById('snow').textContent = kmartWeather.snowfall ?? '--';
            document.getElementById('wind').textContent = kmartWeather.windSpeed ?? '--';
            document.getElementById('windDir').textContent = kmartWeather.windDirection ?? '--';
            document.getElementById('cloud').textContent = kmartWeather.cloudCover ?? '--';

            console.log("Weather data displayed.");
        })();
    </script>

    <h2>Info</h2>
    <h3>Address:</h3><body>4763 Killington Rd, Killington, VT 05751</body>
    <h3>Ski Patrol:</h3><body>(802) 422-1243</body>
    <h3>Map:</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112403.70761643138!2d-72.91860455368649!3d43.583972325109244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e02bfe34c81d67%3A0x6d5265613a610c3a!2sK-1%20Lodge%2C%20Killington!5e1!3m2!1sen!2sus!4v1766887124034!5m2!1sen!2sus" 
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