<?php include '../top.php'; ?>

    <h1>Smuggs</h1>
    <h2>Weather</h2>
    <script src="/SkiCam/script/weatherManager.js"></script>
    <script>
        const wm = new weatherManager();
        wm.fetchData();
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
</html>


