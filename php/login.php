<?php
session_start(); // Start the session
include("./connect.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password have been sent from the form
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Escape special characters to prevent SQL injection
        $username = mysqli_real_escape_string($yhteys, $_POST["username"]);
        $password = mysqli_real_escape_string($yhteys, $_POST["password"]);

        // Check user credentials in the database
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($yhteys, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION["username"] = $username; // Store the username in the session
                $_SESSION["loggedin"] = true;
                header("Location: ../pages/donate.html"); // Redirect to donate.html after successful login
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password"; // Set error message
            }
        } else {
            $_SESSION['error'] = "Invalid username or password"; // Set error message
        }

        // Close the database connection
        mysqli_close($yhteys);
    }
}

// Redirect back to the login page with an error message
$_SESSION['error'] = "Login failed. Please try again.";
header("Location: ../pages/login.html");
exit();
?>