<?php
// Database connection
$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'buku_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$scannedData = $_POST['scannedData'];
$returnDate = date('Y-m-d'); // Set the return date to today
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

// Check if the book exists in the borrowed records
$sql = "SELECT * FROM rekod_pinjaman WHERE email='$email' AND isbn='$isbn'";
$result = $conn->query($sql);

if ($result === FALSE) {
    file_put_contents('debug_log.txt', "SQL Error: " . $conn->error . "\n", FILE_APPEND);
    $errorMessage = urlencode("SQL Error: " . $conn->error);
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

if ($result->num_rows > 0) {
    $borrowRecord = $result->fetch_assoc();
    
    // Insert the return record into rekod_pulangan table
    $sql = "INSERT INTO rekod_pulangan (email, isbn, tajuk_buku, tarikh_pulangan)
            VALUES ('$email', '$isbn', '{$borrowRecord['tajuk_buku']}', '$returnDate')";
    if ($conn->query($sql) === TRUE) {
        // Increment the quantity back to the buku table
        $updateSql = "UPDATE buku SET kuantiti = kuantiti + 1 WHERE isbn='$isbn'";
        if ($conn->query($updateSql) === TRUE) {
            // Delete the borrow record
            $deleteSql = "DELETE FROM rekod_pinjaman WHERE email='$email' AND isbn='$isbn'";
            $conn->query($deleteSql);
            
            // Redirect to main page with success message
            $successMessage = urlencode("Buku telah berjaya dipulangkan!");
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
    $errorMessage = urlencode("Tiada rekod peminjaman untuk buku ini!");
    header("Location: mainpage.php?message=$errorMessage");
    exit;
}

$conn->close();
?>
