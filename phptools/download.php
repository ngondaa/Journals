<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journals";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Get the file ID from the URL parameter
$file_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($file_id <= 0) {
    die("Invalid file ID.");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the file details from the database
$sql = "SELECT file FROM Journals WHERE id = $file_id";
$result = $conn->query($sql);

if ($result === false || $result->num_rows == 0) {
    die("File not found.");
}

$row = $result->fetch_assoc();
$file_path = $row['file'];

// Check if file exists on the server
if (!file_exists($file_path)) {
    die("File not found on server.");
}

// Serve the file for download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file_path));
readfile($file_path);
exit;
?>
