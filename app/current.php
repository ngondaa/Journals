<?php
session_start();
include("../phptools/connectionDB.php");
include("../phptools/Feedback.php");

$feedback = new Feedback();

if (!isset($_SESSION['email'])) {
    echo "<script>   
            window.location.href = 'login.php';
          </script>";
} else {
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
        <style>
            body {
                font-family: "Kanit", sans-serif;
                font-weight: 300;
                font-style: normal;
            }

            .contact {
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h3 {
                color: #333;
            }

            h1 {
                font-size: 28px;
                margin-bottom: 15px;
            }

            h3 {
                margin-top: 20px;
            }

            p {
                font-size: 16px;
                line-height: 1.6;
                color: #666;
            }

            .feedback-form {
                max-width: 400px;
                margin: 0 auto;
            }

            label {
                display: block;
                font-size: 16px;
                margin-bottom: 8px;
                color: #333;
            }

            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                resize: vertical;
                font-size: 16px;
                margin-bottom: 20px;
            }

            input[type="submit"] {
                width: 100%;
                padding: 12px 20px;
                background-color: #0d363fbd;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 18px;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #0d363f7f;
            }

            .concenter {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .reviews-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                margin-top: 20px;
            }

            .review-item {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 15px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                flex: 1 1 calc(33% - 30px);
                max-width: calc(33% - 30px);
                box-sizing: border-box;
            }

            .review-item strong {
                display: block;
                font-size: 16px;
                margin-bottom: 10px;
                color: #333;
            }

            .review-item p {
                font-size: 14px;
                color: #666;
                margin-bottom: 10px;
            }

            .delete-button {
                padding: 5px 10px;
                background-color: #ff6666;
                color: #fff;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 12px;
            }

            .delete-button:hover {
                background-color: #ff3333;
            }

            .centerText {
                text-align: center;
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Current</a>
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
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo "<div>Welcome, " . htmlspecialchars($_SESSION['email']) . "</div>";
                    } else {
                        echo '<a href="login.php">Login</a>';
                    }
                    ?>
                    <h3 class="mt-4">Reviews</h3>
                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>

                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<a href='CustomerDashboard.php'><i class='fa-regular fa-user'></i></a>";
                    } else {
                        echo "<a href='loginInterface.php'><i class='fa-regular fa-user'></i></a>";
                    }

                    if (isset($_POST["dr"])) {
                        $feedback->deleteReview($_POST["dr"]);
                        unset($_POST);
                    }
                    ?>

                    <div class="reviews-grid">
                        <?php
                        $answers = $feedback->loadReviews("*");

                        if ($answers->num_rows > 0) {
                            while ($row = $answers->fetch_assoc()) {
                                echo "<div class='review-item'><p><strong>@" . $row['email'] . "</strong></p><p>" . $row["review"] . "</p>";
                                if (isset($_SESSION["email"])) {
                                    if ($row['email'] === $_SESSION["email"]) {
                                        echo "<form method='POST' action='#'>
                                <input type='text' name='dr' value='" . $row["reviewID"] . "' hidden>
                                <input type='submit' class='delete-button' value='Delete'>
                                </form>";
                                    }
                                }
                                echo "</div>";
                            }
                        } else {
                            echo "<h3 class='col-12 centerText'>0 reviews found</h3>";
                            echo "<h4 class='col-12 centerText'>To make a review go to <a href='Review.php'>Contact Us</a> page</h4>";
                        }
                        ?>
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
}
?>