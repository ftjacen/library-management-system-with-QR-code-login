<?php
include('phpqrcode/qrlib.php');

$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'buku_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tajuk_buku = $_POST['tajuk_buku'];
$penerbit = $_POST['penerbit'];
$isbn = $_POST['isbn'];
$kuantiti = $_POST['kuantiti'];

$qrContent = "Tajuk Buku: $tajuk_buku\nPenerbit: $penerbit\nISBN: $isbn\nKuantiti Buku: $kuantiti";

if (!is_dir('book_qrcodes')) {
    mkdir('book_qrcodes', 0777, true);
}

$sanitizedFileName = preg_replace('/[^A-Za-z0-9_]/', '_', $tajuk_buku);
$qrCodePath = 'book_qrcodes/' . $sanitizedFileName . '.png';

QRcode::png($qrContent, $qrCodePath, QR_ECLEVEL_L, 10);

$sql = "INSERT INTO buku (tajuk_buku, penerbit, isbn, kuantiti, qr_code_path)
        VALUES ('$tajuk_buku', '$penerbit', '$isbn', '$kuantiti', '$qrCodePath')";

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
            <h2>QR Code Buku</h2>
            <a href="<?php echo $qrCodePath; ?>" download class="download" title="Tekan untuk download QR Code">Download QR Code</a>
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
