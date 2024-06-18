<?php
session_start(); // Start the session to access session variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journals";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect or handle non-logged in users
    header("Location: login.php");
    exit;
}

// Get the logged-in user's email from session
$user_email = $_SESSION['email'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to fetch submissions by the logged-in user
$sql = "
    SELECT Journals.title, Journals.author, Journals.description, Journals.file, Journals.created_at 
    FROM Journals 
    JOIN Users ON CONCAT(Users.firstname, ' ', Users.lastname) = Journals.author 
    WHERE Users.email = '$user_email' 
    ORDER BY Journals.created_at DESC";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <style>
        .journal-entry {
            padding: 10px;
            background-color: #f9f9f9;
        }

        .odd-row {
            background-color: #ffffff; /* White background for odd rows */
        }

        .even-row {
            background-color: #f2f2f2; /* Light gray background for even rows */
        }

        .no-submissions {
            text-align: center;
            color: #777;
            padding: 50px;
        }

        .download-btn {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    $count = 0; // Initialize count for alternating row colors
    while ($row = $result->fetch_assoc()) {
        $count++;
        // Determine row color based on odd or even count
        $row_class = ($count % 2 == 0) ? "even-row" : "odd-row";

        echo "<div class='journal-entry $row_class'>";
        echo "<h4>" . htmlspecialchars($row["title"]) . "</h4>";
        echo "<p><strong>Author:</strong> " . htmlspecialchars($row["author"]) . "</p>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><small>Submitted on " . $row["created_at"] . "</small></p>";
        echo "<a href='" . htmlspecialchars($row["file"]) . "' class='download-btn' download>Download</a>";
        echo "</div><hr>";
    }
} else {
    echo "<div class='no-submissions'>No submissions found.</div>";
}

$conn->close();
?>

</body>
</html>
