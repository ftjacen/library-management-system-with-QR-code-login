<<<<<<< HEAD
<?php
session_start();
if (!isset($_SESSION['student_name'])) {
    header("Location: mainpage.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pinjaman Buku</title>
    <link rel="icon" href="images/9.png" type="image/x-icon">
    <link rel="stylesheet" href="borrow_return.css">
    <script src="node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <div class="toper"></div>
    <p class="name"><?php echo $_SESSION['student_name']; ?></p>
    <a href="mainpage.php"><img src="images/1-removebg-preview.png" alt="icon" class="top"></a>    

    <form class="form" action="process_borrow.php" method="post" style="width: 630px;">
        <div class="container">
            <p class="title">Pinjaman Buku</p>
            <p class="message">Imbas kod qr pada buku belakang.</p> 
            <div id="reader" class="bookreader"></div>
            <div class="form-content">

                <label for="scannedData">
                    <textarea class="input"  
                    style="width: 300px;height: 60px;resize: none;width: 100%;margin-bottom: 10px;" id="scannedData" name="scannedData" rows="4" readonly></textarea>
                    <span style="position: absolute;top: 5px;">Maklumat buku:</span>
                </label>

                <label for="email">
                    <input class="input" 
                    style="margin-bottom: 10px; width: 270px;" type="email" id="email" name="email" required>
                    <span>Email:</span>
                </label>

                <label for="returnDate">
                    <input class="input" style="margin-bottom: 10px;" type="text" id="returnDate" name="returnDate" required>
                    <span style="position: absolute;top: 5px;">Tarikh Pemulangan:</span>
                </label>

                <button class="submit" style="margin-top: auto;" type="submit">Pinjam Buku</button>
            </div>
        </div>
    </form>

    <footer>
        <div class="bottom"></div>
        <h2 class="info"><b>Hubungi Kami</b></h2>

        <img src="images/4.png" class="email-icon">
        <p class="email">messi.academy@yahoo.com</p>

        <img src="images/5.png" class="contact-icon">
        <p class="contact">03-6241 9378</p>
        
        <img src="images/6.png" alt="Instagram icon" class="insta-icon">
        <a href="https://www.instagram.com/messi_skills_academy/" class="insta">Instagram Page</a>
    </footer>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            const lines = decodedText.split("\n");
            let bookInfo = {};
            
            lines.forEach(line => {
                const [key, value] = line.split(": ");
                if (key && value) {
                    bookInfo[key.trim()] = value.trim();
                }
            });

            const title = bookInfo['Tajuk Buku'] ? bookInfo['Tajuk Buku'] : "Title not found";
            const isbn = bookInfo['ISBN'] ? bookInfo['ISBN'] : "ISBN not found";

            document.getElementById('scannedData').value = `Tajuk Buku: ${title}\nISBN: ${isbn}`;
        }

        function onScanFailure(error) {
            console.warn(`QR Code scan error: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 200 });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        const unavailableDates = [
             
        ];// Example unavailable date
        // Setup Flatpickr for return date with min, max, and unavailable dates

        const returnDateInput = document.getElementById("returnDate");

        const today = new Date();
        const maxDate = new Date();
        maxDate.setDate(today.getDate() + 7); 

        flatpickr(returnDateInput, {
            minDate: "today", 
            maxDate: maxDate, 
            disable: [...unavailableDates, maxDate.toISOString().split("T")[0]], // add max date to unavaible date
            dateFormat: "Y-m-d"
        });
    </script>
</body>
</html>
=======
<?php
session_start();
if (!isset($_SESSION['student_name'])) {
    header("Location: mainpage.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pinjaman Buku</title>
    <link rel="icon" href="images/9.png" type="image/x-icon">
    <link rel="stylesheet" href="borrow_return.css">
    <script src="node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <div class="toper"></div>
    <p class="name"><?php echo $_SESSION['student_name']; ?></p>
    <a href="mainpage.php"><img src="images/1-removebg-preview.png" alt="icon" class="top"></a>    

    <form class="form" action="process_borrow.php" method="post" style="width: 630px;">
        <div class="container">
            <p class="title">Pinjaman Buku</p>
            <p class="message">Imbas kod qr pada buku belakang.</p> 
            <div id="reader" class="bookreader"></div>
            <div class="form-content">

                <label for="scannedData">
                    <textarea class="input"  
                    style="width: 300px;height: 60px;resize: none;width: 100%;margin-bottom: 10px;" id="scannedData" name="scannedData" rows="4" readonly></textarea>
                    <span style="position: absolute;top: 5px;">Maklumat buku:</span>
                </label>

                <label for="email">
                    <input class="input" 
                    style="margin-bottom: 10px; width: 270px;" type="email" id="email" name="email" required>
                    <span>Email:</span>
                </label>

                <label for="returnDate">
                    <input class="input" style="margin-bottom: 10px;" type="text" id="returnDate" name="returnDate" required>
                    <span style="position: absolute;top: 5px;">Tarikh Pemulangan:</span>
                </label>

                <button class="submit" style="margin-top: auto;" type="submit">Pinjam Buku</button>
            </div>
        </div>
    </form>

    <footer>
        <div class="bottom"></div>
        <h2 class="info"><b>Hubungi Kami</b></h2>

        <img src="images/4.png" class="email-icon">
        <p class="email">messi.academy@yahoo.com</p>

        <img src="images/5.png" class="contact-icon">
        <p class="contact">03-6241 9378</p>
        
        <img src="images/6.png" alt="Instagram icon" class="insta-icon">
        <a href="https://www.instagram.com/messi_skills_academy/" class="insta">Instagram Page</a>
    </footer>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            const lines = decodedText.split("\n");
            let bookInfo = {};
            
            lines.forEach(line => {
                const [key, value] = line.split(": ");
                if (key && value) {
                    bookInfo[key.trim()] = value.trim();
                }
            });

            const title = bookInfo['Tajuk Buku'] ? bookInfo['Tajuk Buku'] : "Title not found";
            const isbn = bookInfo['ISBN'] ? bookInfo['ISBN'] : "ISBN not found";

            document.getElementById('scannedData').value = `Tajuk Buku: ${title}\nISBN: ${isbn}`;
        }

        function onScanFailure(error) {
            console.warn(`QR Code scan error: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 200 });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        const unavailableDates = [
             
        ];// Example unavailable date
        // Setup Flatpickr for return date with min, max, and unavailable dates

        const returnDateInput = document.getElementById("returnDate");

        const today = new Date();
        const maxDate = new Date();
        maxDate.setDate(today.getDate() + 7); 

        flatpickr(returnDateInput, {
            minDate: "today", 
            maxDate: maxDate, 
            disable: [...unavailableDates, maxDate.toISOString().split("T")[0]], // add max date to unavaible date
            dateFormat: "Y-m-d"
        });
    </script>
</body>
</html>
>>>>>>> b5a8b6f (Initial commit)
