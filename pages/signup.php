<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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
            <a class="navbar-brand" href="../index.html">
                <img src="../images/catLogo.png" alt="logo" height="50" width="auto">
            </a>
        </li>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../pages/cats.php">Cats</a></li>
        <li><a href="../pages/donatepage.html">Donate</a></li>
        <li><a href="../pages/about.php">About us</a></li>
        <li><a href="../pages/signup.php">Sign up</a></li>
        <?php
        // Aloita istunto
        session_start();

        // Tarkista, onko käyttäjä kirjautunut sisään
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Näytä log out -painike
            echo '<li><a href="../php/logout.php">Log out</a></li>';
            // Näytä "Registered Users" -linkki
            echo '<li><a href="../salainen/registeredusers.html">Registered Users</a></li>';
        } else {
            // Näytä kirjaudu sisään -painike
            echo '<li><a href="../pages/login.php">Log in</a></li>';
        }
        ?>
    </ul>
    <form>
        <input type="text" placeholder="Search" aria-label="Search">
        <button type="submit">Search</button>
    </form>
</nav>

    <h2></h2>
    <form class="form" action="../php/signup.php" method="post">
       <h2>Sign Up to Donate</h2> 
       <label for="fName">First Name:</label><br>
        <input type="text" id="fName" name="fName"><br>
        <label for="lName">Last Name:</label><br>
        <input type="text" id="lName" name="lName"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Sign up">
    </form>

    <h2></h2>
    <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">

</body>

</html>