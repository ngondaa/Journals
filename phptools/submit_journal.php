<?php
session_start();
include("connectionDB.php");

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "error";
    exit;
}

// Check if form submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $description = $conn->real_escape_string($_POST['description']);

    // File upload handling
    $file = $_FILES['file'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($file['size'] > 5000000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedTypes = array("jpg", "png", "jpeg", "gif", "pdf", "doc", "docx");
    if (!in_array($fileType, $allowedTypes)) {
        echo "Only JPG, JPEG, PNG, GIF, PDF, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error uploading your file.";
    } else {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // File uploaded successfully, now insert journal data into database
            $sql = "INSERT INTO journals (title, author, description, file, created_at) VALUES ('$title', '$author', '$description', '$target_file', NOW())";

            if ($conn->query($sql) === TRUE) {
                echo "Journal submitted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading your file.";
        }
    }
}

$conn->close();
?>
