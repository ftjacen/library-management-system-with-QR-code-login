<?php
session_start();
$conn = new mysqli('localhost', 'Jacen', 'Ljx@051021', 'pelajar_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['ic'])) {
    $nombor_ic = $conn->real_escape_string($_GET['ic']);
    $sql = "SELECT nama FROM pelajar WHERE nombor_ic='$nombor_ic'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['student_name'] = $row['nama'];
        $successMessage = urlencode("Log Masuk Berjaya!");
        header("Location: mainpage.php?message=$successMessage");

    } else {
        $errorMessage = urlencode("Pelajar Tidak Ditemui.");
        header("Location: login.php?message=$errorMessage");
        exit;
    }
}

$conn->close();
?>
