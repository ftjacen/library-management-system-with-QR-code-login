<?php
include('phpqrcode/qrlib.php'); 

$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'pelajar_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$nombor_ic = $_POST['nombor_ic'];
$kursus = $_POST['kursus'];
$nombor_telefon = $_POST['nombor_telefon'];

$qrContent = "Nama: $nama\nNombor IC: $nombor_ic\nKursus: $kursus\nNombor Telefon: $nombor_telefon";

if (!is_dir('student_qrcodes')) {
    mkdir('student_qrcodes', 0777, true);
}

$sanitizedFileName = preg_replace('/[^A-Za-z0-9_]/', '_', $nama); 
$qrCodePath = 'student_qrcodes/' . $sanitizedFileName . '.png';

QRcode::png($qrContent, $qrCodePath, QR_ECLEVEL_L, 10);

$sql = "INSERT INTO pelajar (nama, nombor_ic, kursus, nombor_telefon, qr_code_path)
        VALUES ('$nama', '$nombor_ic', '$kursus', '$nombor_telefon', '$qrCodePath')";

$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menjana Kod QR</title>
    <link rel="icon" href="images/12.png" type="image/x-icon">
    <link rel="stylesheet" href="generate_process.css">
</head>
<body>
    <div class="form-container" id="formContainer">
        <div class="form">
            <h2>QR Code Pelajar</h2>
            <a href="<?php echo $qrCodePath; ?>" download class="download">Download QR Code</a>
            <p>QR Code telah berjaya dijana!</p><br>
            <a href="form.php" class="submit"><b>Jana QR Code Lain</b></a>
        </div>
    </div>
    
    <script>
        function switchForm(index) {
            const formContainer = document.getElementById('formContainer');
            const tabIndicator = document.getElementById('tabIndicator');
            const tabs = document.querySelectorAll('.tab');
            
            document.querySelectorAll('.tab').forEach((tab, i) => {
                tab.classList.toggle('active', i === index);
            });
            tabIndicator.style.transform = index === 0 ? 'translateX(0%)' : 'translateX(100%)';
            formContainer.style.transform = `translateX(-${index * 50}%)`;
        }
    </script>
</body>
</html> 
