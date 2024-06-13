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
            /* Three columns side by side */
.column {
  float: left;
  width: 50%;
  margin-bottom: 16px;
  padding: 0 8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

/* Add some shadows to create a card effect */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* Some left and right padding inside the container */
.container {
  padding: 0 16px;
}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
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
                    <h2 class="mt-4">Editorial Board</h2>
                    <br>
                
                    <div class="row">
                        <div class="column">
                            <div class="card">
                
                                <div class="container">
                                    <h4>Tiyamike Ngonda, PhD</h4>
                                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                                    <p class="title">Co-Editors-in-Chief</p>
                                    <p>Department of Mechanical and Mechatronic Engineering, Cape Peninsula University of Technology, South Africa</p>
                                    <p>ngondat@cput.ac.za</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>
                
                        <div class="column">
                            <div class="card">
                
                                <div class="container">
                                    <h4>Velaphi Msomi, PhD</h4>
                                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                                    <p class="title">Co-Editors-in-Chief</p>
                                    <p>Department of Mechanical, Bioresources and Biomedical Engineering, University of South Africa, South Africa</p>
                                    <p>example@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <h2 class="mt-4">Associate Board</h2>
                    <br>
                
                    <div class="row">
                        <div class="column">
                            <div class="card">
                
                                <div class="container">
                                    <h4>Sipokazi Mabuwa, DEng</h4>
                                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                                    <p class="title"></p>
                                    <p>Department of Mechanical and Mechatronic Engineering, Durban University of Technology, South Africa</p>
                                    <p>example@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                
                                <div class="container">
                                    <h4>Richard Nkhoma, PhD</h4>
                                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                                    <p class="title"></p>
                                    <p>Department of Engineering , Malawi University of Science and Technology, Malawi</p>
                                    <p>ngondat@cput.ac.za</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="column">
                            <div class="card">
                
                                <div class="container">
                                    <h4>Kant Kanyarusoke, DEng</h4>
                                    <div style="display: flex; background-color: rgba(255, 102, 166, 0.278); height: 4px;">&nbsp;</div>
                                    <p class="title"></p>
                                    <p>Department of Chemical and Process Engineering, Busitema University, Uganda.</p>
                                    <p>example@example.com</p>
                                    <p><button class="button">Contact</button></p>
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
