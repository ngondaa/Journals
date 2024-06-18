<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journals";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>   
            window.location.href = 'login.php';
          </script>";
    exit;
}

// Get the logged-in user's email
$user_email = $_SESSION['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from the database
$sql = "SELECT firstname, lastname, email, role FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("User not found.");
}

$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Profile</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/login.css">
    <style>
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            background-color: #ffffff;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-details {
            list-style: none;
            padding: 0;
        }

        .profile-details li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .profile-details li span {
            font-weight: bold;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="color:white">Journals</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Dashboard.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Library.php">Library</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="current.php">Current</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Review.php">Review</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Submit.php">Submit</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color: white;">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="Dashboard.php" style="color: white;">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="About.php" style="color: white;">About</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Account</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../phptools/logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <div class="profile-container">
                    <div class="profile-header">
                        <h2>User Profile</h2>
                    </div>
                    <ul class="profile-details">
                        <li><span>First Name:</span> <?php echo htmlspecialchars($user['firstname']); ?></li>
                        <li><span>Last Name:</span> <?php echo htmlspecialchars($user['lastname']); ?></li>
                        <li><span>Email:</span> <?php echo htmlspecialchars($user['email']); ?></li>
                        <li><span>Role:</span> <?php echo htmlspecialchars($user['role']); ?></li>
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>

</html>
<?php
$conn->close();
?>
