<!-- database connection -->
<?php 
   // $servername = "localhost";
   // $username = "user";
    //$password = "password";
    
    // Create connection
   // $conn = new mysqli($servername, $username, $password, "")
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "journals");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>