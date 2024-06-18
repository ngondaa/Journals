<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journals login</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php
    include("../phptools/connectionDB.php"); 

    $error_message = '';

    // Check if email and password are provided
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare SQL statement to prevent SQL injection
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row["passkey"])) {
                // Authentication successful, set session variable and redirect
                $_SESSION['email'] = $email;
                if ($row["role"] == "admin") {
                    header("Location: dashboard.php");
                } else {
                    header("Location: dashboard.php");
                }
                exit;
            } else {
                // Authentication failed, display an error message
                $error_message = 'Incorrect password, please try again.';
            }
        } else {
            // User does not exist
            $error_message = 'User does not exist.';
        }
    }
    ?>

    <div class="container" style="border: solid 1px; border-radius: 15px; border-color: gainsboro;">
        <form class="form" method="post" action="login.php">
            <p class="title">Login</p>
            <p class="message">Welcome Back</p>
            <label>
                <input required type="email" class="input" style="width: 357px;" name="email">
                <span>Email</span>
            </label> 
            <label>
                <input required type="password" class="input" style="width: 357px;" name="password">
                <span>Password</span>
            </label>
            <p id="wrongp" style="color: red;"><?php echo $error_message; ?></p>
            <p><a href="#" style="text-decoration: none; font-size: small;">Forgot Password</a></p>
            <button class="submit">Login</button>
            <p class="signin">Don't have an account? <a href="signup.php">Register</a></p>
        </form>
    </div> 
</body>
</html>
