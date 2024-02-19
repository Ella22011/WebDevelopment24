<?php

// Connect to the database
include("./connect.php");

// Get user input data
$fName = isset($_POST["fName"]) ? $_POST["fName"] : "";
$lName = isset($_POST["lName"]) ? $_POST["lName"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Check if the username is already in use
$query = "SELECT * FROM users WHERE username=?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Username is already in use, give an error message or do something else
    echo "Username is already in use!";
} else {
    // Username is unique, add the user to the database

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Define the database query to add the user
    $sql = "INSERT INTO users (fName, lName, email, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

    // Bind the values of variables to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $email, $username, $hashed_password);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Close the database connection
    mysqli_close($connection);

    // Redirect the user to the login page
    header("Location:../pages/login.html");
    exit;
}
?>
