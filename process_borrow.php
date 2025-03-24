<<<<<<< HEAD
<?php
// Database connection
$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'buku_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$scannedData = $_POST['scannedData'];
$returnDate = $_POST['returnDate'];
$email = $_POST['email']; // Retrieve the email

// Parse the scanned data
$lines = explode("\n", $scannedData);
$bookInfo = [];
foreach ($lines as $line) {
    list($key, $value) = explode(": ", $line);
    $bookInfo[trim($key)] = trim($value); // Trim values to remove any unwanted spaces
}

// Log the parsed book information
file_put_contents('debug_log.txt', "Parsed Info:\n" . print_r($bookInfo, true) . "\n", FILE_APPEND);

// Check if ISBN key exists and log it
if (!isset($bookInfo['ISBN'])) {
    file_put_contents('debug_log.txt', "ISBN key not found in scanned data!\n", FILE_APPEND);
    $errorMessage = urlencode("ISBN key not found in scanned data!");
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

$isbn = $bookInfo['ISBN'];

// Check if the book exists and has sufficient quantity
$sql = "SELECT * FROM buku WHERE isbn='$isbn'";
$result = $conn->query($sql);

if ($result === FALSE) {
    file_put_contents('debug_log.txt', "SQL Error: " . $conn->error . "\n", FILE_APPEND);
    $errorMessage = urlencode("SQL Error: " . $conn->error);
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
    if ($book['kuantiti'] > 0) {
        // Mark the book as borrowed (insert into rekod_pinjaman table)
        $sql = "INSERT INTO rekod_pinjaman (email, isbn, tajuk_buku, tarikh_pemulang)
                VALUES ('$email', '$isbn', '{$bookInfo['Tajuk Buku']}', '$returnDate')";
        if ($conn->query($sql) === TRUE) {
            // Decrement the quantity
            $updateSql = "UPDATE buku SET kuantiti = kuantiti - 1 WHERE isbn='$isbn'";
            if ($conn->query($updateSql) === TRUE) {
                // Redirect to main page with success message
                $successMessage = urlencode("Buku telah berjaya dipinjam! Tarikh pemulangan: $returnDate.");
                header("Location: mainpage.php?message=$successMessage");
                exit;
            } else {
                $errorMessage = urlencode("Ralat mengemas kini kuantiti: " . $conn->error);
                header("Location: mainpage.php?message=$errorMessage");
                exit;
            }
        } else {
            $errorMessage = urlencode("Ralat: " . $conn->error);
            header("Location: mainpage.php?message=$errorMessage");
            exit;
        }
    } else {
        $errorMessage = urlencode("Buku ini kehabisan stok!");
        header("Location: mainpage.php?message=$errorMessage");
        exit;
    }
} else {
    $errorMessage = urlencode("Buku tidak ditemui!");
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

$conn->close();
?>
=======
<?php
// Database connection
$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'buku_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$scannedData = $_POST['scannedData'];
$returnDate = $_POST['returnDate'];
$email = $_POST['email']; // Retrieve the email

// Parse the scanned data
$lines = explode("\n", $scannedData);
$bookInfo = [];
foreach ($lines as $line) {
    list($key, $value) = explode(": ", $line);
    $bookInfo[trim($key)] = trim($value); // Trim values to remove any unwanted spaces
}

// Log the parsed book information
file_put_contents('debug_log.txt', "Parsed Info:\n" . print_r($bookInfo, true) . "\n", FILE_APPEND);

// Check if ISBN key exists and log it
if (!isset($bookInfo['ISBN'])) {
    file_put_contents('debug_log.txt', "ISBN key not found in scanned data!\n", FILE_APPEND);
    $errorMessage = urlencode("ISBN key not found in scanned data!");
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

$isbn = $bookInfo['ISBN'];

// Check if the book exists and has sufficient quantity
$sql = "SELECT * FROM buku WHERE isbn='$isbn'";
$result = $conn->query($sql);

if ($result === FALSE) {
    file_put_contents('debug_log.txt', "SQL Error: " . $conn->error . "\n", FILE_APPEND);
    $errorMessage = urlencode("SQL Error: " . $conn->error);
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
    if ($book['kuantiti'] > 0) {
        // Mark the book as borrowed (insert into rekod_pinjaman table)
        $sql = "INSERT INTO rekod_pinjaman (email, isbn, tajuk_buku, tarikh_pemulang)
                VALUES ('$email', '$isbn', '{$bookInfo['Tajuk Buku']}', '$returnDate')";
        if ($conn->query($sql) === TRUE) {
            // Decrement the quantity
            $updateSql = "UPDATE buku SET kuantiti = kuantiti - 1 WHERE isbn='$isbn'";
            if ($conn->query($updateSql) === TRUE) {
                // Redirect to main page with success message
                $successMessage = urlencode("Buku telah berjaya dipinjam! Tarikh pemulangan: $returnDate.");
                header("Location: mainpage.php?message=$successMessage");
                exit;
            } else {
                $errorMessage = urlencode("Ralat mengemas kini kuantiti: " . $conn->error);
                header("Location: mainpage.php?message=$errorMessage");
                exit;
            }
        } else {
            $errorMessage = urlencode("Ralat: " . $conn->error);
            header("Location: mainpage.php?message=$errorMessage");
            exit;
        }
    } else {
        $errorMessage = urlencode("Buku ini kehabisan stok!");
        header("Location: mainpage.php?message=$errorMessage");
        exit;
    }
} else {
    $errorMessage = urlencode("Buku tidak ditemui!");
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

$conn->close();
?>
>>>>>>> b5a8b6f (Initial commit)
