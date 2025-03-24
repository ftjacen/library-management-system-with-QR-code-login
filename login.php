<<<<<<< HEAD
<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>
    <link rel="icon" href="images/11.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <script src="node_modules/html5-qrcode/html5-qrcode.min.js"></script>
</head>
<body>
    <div id="notification" class="notification"></div>
    <form class="form">
        <p class="title">Selamat Datang </p>
        <p class="message">Imbas kod QR pada kad id anda untuk log masuk. </p> 
        <div id="reader"></div>
    </form>

    <script>
        function onScanSuccess(decodedText) {
            // Handle the scanned QR code
            const icNumber = decodedText.split('\n')[1].split(': ')[1]; // Extract Nombor IC from the QR code text
            window.location.href = `process_login.php?ic=${icNumber}`; // Redirect to login processing page
        }

        function onScanError(errorMessage) {
            console.warn(`QR Code scan error: ${errorMessage}`);
        }

        const html5QrCode = new Html5Qrcode("reader");

        // Start scanning
        html5QrCode.start(
            { facingMode: "environment" }, // Use the back camera
            {
                fps: 10,
                qrbox: { width: 290, height: 290 } // Set the size of the QR box
            },
            onScanSuccess,
            onScanError
        ).catch(err => {
            console.error(`Unable to start scanning: ${err}`);
        });

        const message = "<?php echo $message; ?>";
        if (message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 4000);
        }
    </script>
</body>
</html>
=======
<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>
    <link rel="icon" href="images/11.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <script src="node_modules/html5-qrcode/html5-qrcode.min.js"></script>
</head>
<body>
    <div id="notification" class="notification"></div>
    <form class="form">
        <p class="title">Selamat Datang </p>
        <p class="message">Imbas kod QR pada kad id anda untuk log masuk. </p> 
        <div id="reader"></div>
    </form>

    <script>
        function onScanSuccess(decodedText) {
            // Handle the scanned QR code
            const icNumber = decodedText.split('\n')[1].split(': ')[1]; // Extract Nombor IC from the QR code text
            window.location.href = `process_login.php?ic=${icNumber}`; // Redirect to login processing page
        }

        function onScanError(errorMessage) {
            console.warn(`QR Code scan error: ${errorMessage}`);
        }

        const html5QrCode = new Html5Qrcode("reader");

        // Start scanning
        html5QrCode.start(
            { facingMode: "environment" }, // Use the back camera
            {
                fps: 10,
                qrbox: { width: 290, height: 290 } // Set the size of the QR box
            },
            onScanSuccess,
            onScanError
        ).catch(err => {
            console.error(`Unable to start scanning: ${err}`);
        });

        const message = "<?php echo $message; ?>";
        if (message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 4000);
        }
    </script>
</body>
</html>
>>>>>>> b5a8b6f (Initial commit)
