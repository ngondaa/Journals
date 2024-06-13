<?php

class Feedback {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "journals");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function addReview($email, $review) {
        $userName = $this->conn->real_escape_string($email);
        $reviewText = $this->conn->real_escape_string($review);

        // Fetch the user ID based on the username/email
        $userQuery = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $userQuery->bind_param("s", $userName);
        $userQuery->execute();
        $userResult = $userQuery->get_result();
        $userData = $userResult->fetch_assoc();

        if ($userData) {
            $userID = $userData['id'];
            $query = $this->conn->prepare("INSERT INTO reviews (id, email, review) VALUES (?, ?, ?)");
            $query->bind_param("iss", $userID, $userName, $reviewText);
            if ($query->execute()) {
                echo "<script type='text/javascript'>
                    var message = 'Review submission success';
                    var popup = document.createElement('div');
                    popup.innerHTML = message;
                    popup.setAttribute('style', 'color: darkblue; margin-top: 10px;');
                    
                    var targetElement = document.getElementById('response');
                    targetElement.appendChild(popup);
                </script>";
            } else {
                echo "<script>alert('Failed to insert review')</script>";
            }
        } else {
            echo "<script>alert('User not found')</script>";
        }
    }

    public function loadReviews($specify) {
        $specify = $this->conn->real_escape_string($specify);
        if ($specify == "*") {
            $sql = "SELECT * FROM reviews";
        } else {
            $sql = "SELECT * FROM reviews WHERE email = '$specify'";
        }
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deleteReview($reviewId) {
        $reviewId = $this->conn->real_escape_string($reviewId);
        $query = $this->conn->prepare("DELETE FROM reviews WHERE reviewID = ?");
        $query->bind_param("i", $reviewId);
        if ($query->execute()) {
            echo "<script type='text/javascript'>
                var message = 'REVIEW DELETED';
                var popup = document.createElement('div');
                popup.innerHTML = message;
                popup.setAttribute('style', 'color: red;');
                
                var targetElement = document.getElementById('deletion');
                targetElement.appendChild(popup);
            </script>";
        } else {
            echo "<script>alert('Failed to delete review');</script>";
        }
    }
}

$feedback = new Feedback();
?>
