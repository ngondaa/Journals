<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journals";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM journals ORDER BY created_at DESC";
$result = $conn->query($sql);

$journals = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $journals[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($journals);
?>
