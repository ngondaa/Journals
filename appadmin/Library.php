<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journals";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch journals data
$sql = "SELECT id, title, author, description, created_at FROM Journals ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ngonda</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .container {
            display: flex;
            align-items: flex-start;
        }

        .input-container {
            width: 220px;
            position: relative;
        }

        .icon {
            position: absolute;
            right: 10px;
            top: calc(50% + 5px);
            transform: translateY(calc(-50% - 5px));
        }

        .input {
            width: 100%;
            height: 40px;
            padding: 10px;
            transition: .2s linear;
            border: 2.5px solid black;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .input:focus {
            outline: none;
            border: 0.5px solid black;
            box-shadow: -5px -5px 0px black;
        }

        .input-container:hover > .icon {
            animation: anim 1s linear infinite;
        }

        @keyframes anim {
            0%,
            100% {
                transform: translateY(calc(-50% - 5px)) scale(1);
            }

            50% {
                transform: translateY(calc(-50% - 5px)) scale(1.1);
            }
        }

        .journal-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .journal-table th, .journal-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .journal-table th {
            background-color: #f2f2f2;
        }

        .journal-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .journal-table tr:hover {
            background-color: #ddd;
        }

        .download-btn {
            background-color: #0d363fbd;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="color:white;">Journals</div>
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
                            <li class="nav-item active"><a class="nav-link" href="#!" style="color: white;">Home</a></li>
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
                <h3 class="mt-4">Library of Journals</h3>
                <br>
                <div class="container">
                    <div class="input-container">
                        <input type="text" name="text" class="input" placeholder="search...">
                        <span class="icon">
                            <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div>
                        <h4 style="padding-top: 5px;">&nbsp; Find all available journals </h4>
                    </div>
                </div>
                <br>
                <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                <div class="container mt-4">
                    <table class="journal-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Submission Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
                                    echo "<td><a class='download-btn' href='../phptools/download.php?id=" . intval($row["id"]) . "'>Download</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No journals found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>
</html>
