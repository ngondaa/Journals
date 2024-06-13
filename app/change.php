<?php

session_start();

?>
<?php 
include("../phptools/connectionDB.php")
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
       
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/main.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/login.css">
        <style>

body{
    font-family: "Kanit", sans-serif;
    font-weight: 300;
    font-style: normal;
}
.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 100%;
    background-color: #fff;
    padding: 40px;
    border-radius: 20px;
    position: relative;
  }
  .title::before, .title::after {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 0px;
    background-color:rgb(192, 20, 92) ;;
}




        </style>
        
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light" style="color:white ;">Journals</div>
                <div class="list-group list-group-flush" >
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
                                <li class="nav-item active"><a class="nav-link" href="#!"style="color: white;">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="About.php"style="color: white;">About</a></li>

<!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color: white;">Information</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">For Readers</a>
                                        <a class="dropdown-item" href="#!">For Authors</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">For Librians</a>
                                    </div>
                                </li>

-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color: white;">Account</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                <?php
                if (isset($_SESSION['email'])) {
                    echo "<div>Welcome, " . htmlspecialchars($_SESSION['email']) . "</div>";
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
                    <br>
                    
                    
                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                           
                    
                    <div class="container"></div>
                                <form class="form" onsubmit="return confirmPassword()">
                                    <p class="title" style="color: rgb(192, 20, 92) ;">Profile Details  </p>
                                             
                                    <label>
                                        <input id="password" required placeholder="" type="password" class="input"required placeholder="">
                                        <span>Old Password</span>
                                    </label>
                                    <label>
                                        <input id="password" required placeholder="" type="password" class="input"required placeholder="">
                                        <span>New Password</span>
                                    </label>
                                    <label>
                                        <input id="confirmPassword"  type="password" class="input" required placeholder="">
                                        <span>Confirm password</span>
                                    </label>
                                    <p id="message"></p>
                                    <button type="submit" class="submit" style="background-color: #0d363fbd;">Update</button>
                                   
                                </form>
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
