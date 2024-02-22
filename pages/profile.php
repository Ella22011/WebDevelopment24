<?php
include("../php/connect.php");

session_start();

$donate_page = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? "./donate.php" : "./donatepage.html";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
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
        <li><a href="<?php echo $donate_page; ?>">Donate</a></li>
        <li><a href="../pages/about.php">About us</a></li>
        <li><a href="../pages/signup.php">Sign up</a></li>
        <?php
        // Tarkista, onko käyttäjä kirjautunut sisään
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Näytä log out -painike
            echo '<li><a href="../php/logout.php">Log out</a></li>';
            // Näytä "Registered Users" -linkki
            echo '<li><a href="../salainen/registeredusers.html">Registered Users</a></li>';
            //Näytä "Profile" -linkki
            echo '<li><a href="./profile.php">Profile</a></li>';
        } else {
            // Näytä kirjaudu sisään -painike
            echo '<li><a href="../pages/login.php">Log in</a></li>';
        }
        ?>
    </ul>
    <article><h2><strong>Cat Distribution System</strong></h2></article>
</nav>
<header class="profilehead">
<h1>Welcome to your profile</h1>
</header>
<div class="container">
    <?php include('../php/printprofile.php'); ?>
</div>
    
    <form class="form" action="updateprofile.php" method="post">
       <h2>Edit Profile</h2> 
       <?php
       // Tarkista, onko käyttäjä kirjautunut sisään
       if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Hae käyttäjän tiedot tietokannasta
            // Voit käyttää samaa tietokantayhteyttä connect.php-tiedostosta
            $stmt = $yhteys->prepare("SELECT fName, lName, email, username FROM users WHERE user_id = ?");
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Näytä käyttäjän tiedot lomakkeella, jotta niitä voi muokata
            echo '
            <label for="fName">First Name:</label><br>
            <input type="text" id="fName" name="fName" value="' . $user['fName'] . '"><br>
            <label for="lName">Last Name:</label><br>
            <input type="text" id="lName" name="lName" value="' . $user['lName'] . '"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="' . $user['email'] . '"><br><br>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="' . $user['username'] . '"><br>
            <input type="submit" value="Save Changes">';
        }
        ?>
    </form>
    <div class="form">
    <h2>Your donations</h2>
        <?php
        include("../php/dinfo.php");
        ?>
    </div>
</div>

    <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">

</body>

</html>