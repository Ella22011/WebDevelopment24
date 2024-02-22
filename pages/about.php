<?php
session_start();

$donate_page = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? "./donate.php" : "./donatepage.html";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cat Distribution System, your local cat adoption shelter.">
    <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png">
    <title>Cat Distribution System - About Us</title>
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
    <form>
        <input type="text" placeholder="Search" aria-label="Search">
        <button type="submit">Search</button>
    </form>
</nav>

    <main class="homepage">
        <article id="C1">
            <h1>About us</h1>
            <p>We're dedicated to ensuring that every cat finds a loving and caring home. We've witnessed heartwarming
                instances where stray cats seem to choose or adopt their human companions. In these cases, a cat,
                whether lost or seeking a new home, finds its way into the hearts of individuals willing to provide
                care. Veterinary websites offer guidance on what to do when an unknown feline enters your life. Our
                focus is on creating a platform where cats in need can find their way into loving homes. It's not just
                about distribution; it's about fostering meaningful connections between cats and the families ready to
                welcome them with open arms.</p>
        </article>
        <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">
        <article id="C2">
            <h1>Contact us</h1>
            <p>
                Got questions, concerns, or just want to talk cats? We're all ears! Reach out to us using the contact
                information below:
            </p>
            <h3>Contact Information</h3>
            <p>Email: info@catdistribution.com</p>
            <p>Phone: 123-456-7890</p>

            <h3>Visit Our Office</h3>
            <p>Address: 123 Cat Street, Kittyville, CA 12345</p>

            <h3>Business Hours</h3>
            <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
            <p>Saturday - Sunday: Closed</p>
        </article>
    </main>

    <footer class="footer">
        <a href="#main-nav">Back to top</a>
    </footer>

</body>

</html>