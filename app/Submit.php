<?php
session_start();
include("../phptools/connectionDB.php");

if (!isset($_SESSION['email'])) {
    echo "<script>   
            window.location.href = 'login.php';
          </script>";
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ngonda</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/main.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 30px;
            color: #333;
        }

        #profileTabs {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        #profileTabs ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            border-bottom: 1px solid #ccc;
        }

        #profileTabs ul li {
            margin-bottom: -1px;
        }

        #profileTabs ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.3s ease;
        }

        #profileTabs ul li a:hover {
            background-color: #f4f4f4;
        }

        #content {
            margin: 20px auto;
            width: 80%;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .form button {
            border: none;
            background: none;
            color: #8b8ba7;
        }

        .form {
            --timing: 0.3s;
            --width-of-input: 200px;
            --height-of-input: 40px;
            --border-height: 2px;
            --input-bg: #fff;
            --border-color: #2f2ee9;
            --border-radius: 30px;
            --after-border-radius: 1px;
            position: relative;
            width: var(--width-of-input);
            height: var(--height-of-input);
            display: flex;
            align-items: center;
            padding-inline: 0.8em;
            border-radius: var(--border-radius);
            transition: border-radius 0.5s ease;
            background: var(--input-bg, #fff);
        }

        .input {
            font-size: 0.9rem;
            background-color: transparent;
            width: 100%;
            height: 100%;
            padding-inline: 0.5em;
            padding-block: 0.7em;
            border: none;
        }

        .form:before {
            content: "";
            position: absolute;
            background: var(--border-color);
            transform: scaleX(0);
            transform-origin: center;
            width: 100%;
            height: var(--border-height);
            left: 0;
            bottom: 0;
            border-radius: 1px;
            transition: transform var(--timing) ease;
        }

        .form:focus-within {
            border-radius: var(--after-border-radius);
        }

        input:focus {
            outline: none;
        }

        .form:focus-within:before {
            transform: scale(1);
        }

        .reset {
            border: none;
            background: none;
            opacity: 0;
            visibility: hidden;
        }

        input:not(:placeholder-shown)~.reset {
            opacity: 1;
            visibility: visible;
        }

        .form svg {
            width: 17px;
            margin-top: 3px;
        }

        .bbutt {
            color: #090909;
            padding: 0.6em 1.4em;
            font-size: 16px;
            border-radius: 0.5em;
            background: #e8e8e8;
            cursor: pointer;
            border: 1px solid #e8e8e8;
            transition: all 0.3s;
            box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
        }

        .bbutt:active {
            color: #666;
            box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
        }

        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .tab-content {
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 20px;
            background: #fff;
        }

        .no-submissions {
            text-align: center;
            color: #777;
            padding: 50px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .form-inline {
            display: flex;
            align-items: center;
        }

        .header .form-control {
            margin-right: 10px;
        }

        .header .btn-primary {
            margin-left: 10px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .sidebar-heading {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Journals</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Dashboard.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Library.php">Library</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="current.php">Current</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Review.php">Review</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Submit</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="Dashboard.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="About.php">About</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
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
                <h1 class="mt-4">Submissions</h1>
                <div id="profileTabs">
                    <ul>
                        <li><a href="#Submissions">My Journals</a></li>
                    </ul>
                </div>
                <div id="content">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form">
                                <button>
                                    <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                                        <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <input class="input" placeholder="search Journal" required="" type="text">
                                <button class="reset" type="reset">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="bbutt">Add Journal</button>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Submitted</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">In Review</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Accepted</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="no-submissions">No submissions found.</div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="no-submissions">No submissions found.</div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="no-submissions">No submissions found.</div>
                        </div>
                    </div>
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
