<<<<<<< HEAD
<?php
session_start();
if (!isset($_SESSION['student_name'])) {
    header("Location: login.php"); 
    exit;
}
?>

<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messi Skills Academy Library Website</title>
    <link rel="icon" href="images/8.png" type="image/x-icon">
    <link rel="stylesheet" href="mainpage.css">
</head>
<body>
<div id="notification" class="notification"></div>
    <div class="toper">
    <img src="images/1-removebg-preview.png" alt="icon" class="top">
    <p class="name">Selamat Datang, <?php echo $_SESSION['student_name']; ?></p>
    <a href="logout.php" class="out"><b>Log Keluar</b></a>
    </div>

    <div class="abutton">
    <button title="Halaman pinjam buku" class="button"><a href="borrow.php">Peminjaman Buku</a></button>
    <button title="Halaman pemulangan buku" class="button"><a href="return.php">Pemulangan Buku</a></button>
    </div>

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
        const message = "<?php echo $message; ?>";
        if (message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 8000);
        }
    </script>
</body>
</html>
=======
<?php
session_start();
if (!isset($_SESSION['student_name'])) {
    header("Location: login.php"); 
    exit;
}
?>

<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messi Skills Academy Library Website</title>
    <link rel="icon" href="images/8.png" type="image/x-icon">
    <link rel="stylesheet" href="mainpage.css">
</head>
<body>
<div id="notification" class="notification"></div>
    <div class="toper">
    <img src="images/1-removebg-preview.png" alt="icon" class="top">
    <p class="name">Selamat Datang, <?php echo $_SESSION['student_name']; ?></p>
    <a href="logout.php" class="out"><b>Log Keluar</b></a>
    </div>

    <div class="abutton">
    <button title="Halaman pinjam buku" class="button"><a href="borrow.php">Peminjaman Buku</a></button>
    <button title="Halaman pemulangan buku" class="button"><a href="return.php">Pemulangan Buku</a></button>
    </div>

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
        const message = "<?php echo $message; ?>";
        if (message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 8000);
        }
    </script>
</body>
</html>
>>>>>>> b5a8b6f (Initial commit)
