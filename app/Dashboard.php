<?php
session_start();
?>
<?php
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
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/main.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <style>
            .column {
                float: left;
                width: 50%;
                padding: 5px;
            }

            /* Clear floats after image containers */
            .row::after {
                content: "";
                clear: both;
                display: table;
            }

            p {
                font-family: "Kanit", sans-serif;
                font-weight: 300;
                font-style: normal;
            }
        </style>

    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light" style="color:white ;">Journals</div>
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
                    <h1 class="mt-4">Southern Journal of Mechanical Engineering (SJME)</h1>

                    <br>
                    <div class="row">

                        <div class="column">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.yQES4Kv-4WHGPSy0k6kmCAHaFj%26pid%3DApi&f=1&ipt=b60f0f62cfa8b200e86bb0c24cc3531806af06ecd8a3796ea1a58836dfc91ca8&ipo=images" alt="Mountains" style="width:100%">
                        </div>
                        <div class="column">
                            <h4>Scope</h4>
                            <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                            <p>The Southern Journal of Mechanical Engineering (SJME) provides a collaborative and supportive publication platform for disseminating original research, reviews, and case studies. SJME’s scope includes materials engineering, energy systems, mechanical design and manufacturing, mechanics, thermal and fluid sciences, tribology and surface engineering, energy systems and sustainability, biomechanics and biomedical engineering, robotics and automation. </p>
                        </div>
                    </div>
                    <div class="column">
                        <h4>Aim</h4>
                        <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                        <p> The journal is committed to providing publishing opportunities for resource-constrained academics and researchers, ensuring their significant contributions are acknowledged and disseminated. SJME also publishes special issues covering conference proceedings. Organisers of international conferences are invited to submit proposals for special issues.</p>
                    </div>
                    <div class="column">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.DiAPw3XMo_VbeCWI4IyJ_QHaE7%26pid%3DApi&f=1&ipt=0ebfac80c0ef92267ea390798ddc0b17722411fcaa28f731e42b30e29a49038c&ipo=images" alt="Mountains" style="width:100%">
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

<?php
}
?>