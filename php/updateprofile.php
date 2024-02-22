
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <meta name="description" content="Update your profile">
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
        <article>
            <h2><strong>Cat Distribution System</strong></h2>
        </article>
    </nav>


<?php
session_start();
include "./connect.php"; // Sisällytetään tietokantayhteyden määrittely

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../pages/login.php");
    exit;
}

// Tarkista, että kaikki tarvittavat kentät on täytetty
if (empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
    echo "Kaikki kentät ovat pakollisia!";
    exit;
}

// Päivitä käyttäjän tiedot tietokantaan
$stmt = $yhteys->prepare("UPDATE users SET fName=?, lName=?, email=?, username=?, password=? WHERE id=?");
$stmt->bind_param("sssssi", $_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['username'], $_POST['password'], $_SESSION['id']);
$stmt->execute();

echo "Tiedot päivitetty onnistuneesti!";
?>

<img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">

</body>
</html>
