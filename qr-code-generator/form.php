<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menjana QR Code</title>
    <link rel="icon" href="images/12.png" type="image/x-icon">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="navbar"></div>
        <div class="">
            <img src="images/1-removebg-preview.png" alt="icon">
        </div>

    <div class="content">
        <h1>Menjana QR Code Pelajar Baru Dan Buku Baru</h1>
        <p><b>*Untuk Admin Guna</b></p>
    </div>

    <div class="container">
        <div class="tabs">
            <div class="tab active" onclick="switchForm(0)" title="Menjana QR Code untuk pelajar baru">Menjana QR Code Pelajar</div>
            <div class="tab" onclick="switchForm(1)" title="Menjana kod QR untuk buku baru">Menjana QR Code Buku</div>
            <div class="tab-indicator" id="tabIndicator"></div>
        </div>

        <div class="form-container" id="formContainer">
            <form id="studentForm" action="generate_students.php" method="POST" class="form">
                <input class="input" type="text" name="nama" placeholder="Nama" required>
                <input class="input" type="text" name="nombor_ic" placeholder="No. IC" required>
                <input class="input" type="text" name="kursus" placeholder="Kursus" required>
                <input class="input" type="text" name="nombor_telefon" placeholder="Nombor Telefon" required>
                <button type="submit" class="submit">Menjana QR Code</button>
            </form>
    
            <form id="bookForm" action="generate_books.php" method="POST" class="form">
                <input class="input" type="text" name="tajuk_buku" placeholder="Tajuk Buku" required>
                <input class="input" type="text" name="penerbit" placeholder="Penerbit" required>
                <input class="input" type="text" name="isbn" placeholder="ISBN" required>
                <input class="input" type="number" name="kuantiti" placeholder="Kuantiti" required>
                <button type="submit" class="submit">Menjana QR Code</button>
            </form>
        </div>

    </div>
        
    <script>
        function switchForm(index) {
            const formContainer = document.getElementById('formContainer');
            formContainer.style.transform = `translateX(-${index * 50}%)`;
            
            document.querySelectorAll('.tab').forEach((tab, i) => {
                tab.classList.toggle('active', i === index);
            });

            const tabIndicator = document.getElementById('tabIndicator');
            tabIndicator.style.transform = `translateX(${index * 100}%)`;
        }
    </script>
</body>
</html>
