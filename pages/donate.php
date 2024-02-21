<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Käyttäjä ei ole kirjautunut sisään, ohjataan kirjautumissivulle
    header("Location: ./login.php");
    exit;
}

$donate_page = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? "./donate.php" : "./donatepage.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
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
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo '<li id="logout-li"><a id="logout-link" href="../php/logout.php">Log out</a></li>';
        } else {
            echo '<li><a href="../pages/login.php">Log in</a></li>';
        }
        ?>
        <li><a href="../salainen/registeredusers.html">Registered Users</a></li>
    </ul>
    <form>
        <input type="text" placeholder="Search" aria-label="Search">
        <button type="submit">Search</button>
    </form>
</nav>
    <h2></h2>
    <form class="form" method="post" action="../php/form.php">
        <h2>Donate</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="donation_amount">Donation Amount(€):</label><br>
        <input type="number" id="donation_amount" name="donation_amount" step="0"><br>
        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod">
            <option value="mobilepay">MobilePay</option>
            <option value="creditCard">Credit Card</option>
            <option value="paypal">PayPal</option>
        </select><br>
        <label for="donationDate">Date:</label><br>
        <input type="date" id="donationDate" name="donationDate"><br><br>
        <input type="submit" value="Submit your donation">
    </form>
    

    <h2></h2>
    <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">
</body>
</html>