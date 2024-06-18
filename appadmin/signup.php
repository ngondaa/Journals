<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="container" style="border: solid 1px;border-radius: 15px; border-color: gainsboro; ">
    <?php
// establish database connection
include("../phptools/connectionDB.php");
?>
        <!-- 
            action sends form to be processed # in same form ,
            post is a more secure way of sendind the data,
            we create javascript function that checks passwords match before submitting form
        -->
                <form class="form" action="signup.php" method="post" onsubmit="return checkPassword()">
                    <p class="title">Register </p>
                    <p class="message">Signup now and gain access </p>
                        <div class="flex">
                        <label>
                            <input  type="text" class="input" required name="firstname" minlength="3" pattern="[A-Za-z]+" title="Firstname should contain letters only" >
                            <span>Firstname</span>
                        </label>
                
                        <label>
                            <input  type="text" class="input" required name="lastname" minlength="3" pattern="[A-Za-z]+" title="laststname should contain letters only" >
                            <span>Lastname</span>
                        </label>
                    </div>  
                            
                    <label>
                        <input  type="email" class="input" required name="email">
                        <span>Email</span>
                    </label> 
                        
                    <label>
                        <input id="password" required  type="password" class="input"required name="password" minlength="8">
                        <span>Password</span>
                    </label>
                    <label>
                        <input id="confirmPassword"  type="password" class="input" required name="confirmPassword" minlength="8">
                        <span>Confirm password</span>
                    </label>
                    <p id="message"></p>
                    <button type="submit" class="submit" value="submit">submit</button>
                    <p class="signin">Already have an acount ? <a href="login.php">log in</a> </p>
                </form>

    </div> 
   

    <?php 
    if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $passkey = $_POST['password'];

        $hashed_password = password_hash($passkey, PASSWORD_DEFAULT);

        $check_username_query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($check_username_query);

        if($result->num_rows > 0) {
            echo "<script>
                    var messageElement = document.getElementById('message');
                    messageElement.style.color = 'rgb(128,0,0)';
                    messageElement.style.textTransform = 'uppercase';
                    messageElement.textContent = 'Username already exists.';
                  </script>";
        } else {
            $sql_add_user = "INSERT INTO users (firstname,lastname,email,passkey) VALUES ('$firstname','$lastname','$email','$hashed_password')";

            if($conn->query($sql_add_user) === true){
                echo "<script>
            
            window.location.href = 'login.php';
            alert('Registration Success. Now log in.');
          </script>";
            } else {
                echo "<script>
                        var messageElement = document.getElementById('message');
                        messageElement.style.color = 'rgb(128,0,0)';
                        messageElement.style.textTransform = 'uppercase';
                        messageElement.textContent = 'Damn cant add student hopefully you dont see this.';
                      </script>";
            }
        }
    }
?>

<script>
    function checkPassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var messageElement = document.getElementById("message");

        if (password !== confirmPassword) {
            messageElement.style.color = "red";
            messageElement.style.textTransform = "uppercase";
            messageElement.textContent = "Passwords do not match!";
            return false;
        }

        messageElement.textContent = ""; // Clear the message if passwords match
        return true;
    }
</script>

</body>
</html>