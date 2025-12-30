<?php include '../top.php'; ?>

    <h2>Weather</h2>
    <div id='weatherData'>
        <p>Temperature: <span id='temp'>--</span>°F</p>
        <p>Feels Like: <span id='apparent'>--</span>°F</p>
        <p>Snowfall: <span id='snow'>--</span> inches</p>
        <p>Wind Speed: <span id='wind'>--</span> kn</p>
        <p>Wind Direction: <span id='windDir'>--</span>°</p>
        <p>Cloud Cover: <span id='cloud'>--</span>%</p>
    </div>

    <script src="/SkiCam/script/weatherManager.js"></script>
    <script>
        (async function () {
            const smuggsWeather = new weatherManager(44.571944, -72.81333); // Smuggs coordinates

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
    <h3>Ski Patrol:</h3><body>(802) 644-1182</body>
    <h3>Map:</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41332.96457396241!2d-72.80402945668581!3d44.5957180815963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb592a19406e99b%3A0x5e071107948a3ced!2sSmugglers&#39;%20Notch%20Base%20Lodge!5e1!3m2!1sen!2sus!4v1766875383408!5m2!1sen!2sus" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"></iframe>

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
    <caption>Note: this view is of the south side of VT-108 (Stowe); The north side is not available. It is not a through road.</caption>
</html>


