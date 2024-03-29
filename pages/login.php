<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cat Distribution System, your local cat adoption shelter.">
    <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png">
    <link rel="stylesheet" href="../css/styles-ella.css">
</head>
<body>
    <nav id="main-nav">
        <ul>
            <li>
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/catLogo.png" alt="logo" height="50" width="auto">
                </a>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../pages/cats.php">Cats</a></li>
                <li><a href="../pages/donatepage.html">Donate</a></li>
                <li><a href="../pages/about.php">About us</a></li>
                <li><a href="../pages/signup.php">Sign up</a></li>
                <li><a href="../pages/login.php">Log in</a></li>
            </ul>
            <article><h2><strong>Cat Distribution System</strong></h2></article>
        </nav>
<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location:../pages/donate.php");
    exit;
}

?>

<form class="form2" method="post" action="../php/loginauth.php">
    <h2>Login</h2>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">
</body>
</html>