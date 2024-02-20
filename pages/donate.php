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
            <li><a href="../index.html">Home</a></li>
            <li><a href="../pages/cats.html">Cats</a></li>
            <li><a href="../pages/donatepage.html">Donate</a></li>
            <li><a href="../pages/about.html">About us</a></li>
            <li><a href="../pages/signup.html">Sign up</a></li>
            <li><a href="../pages/login.html">Log in</a></li>
            <li><a href="../salainen/registeredusers.html">Log in</a></li>
            <li id="logout-li" style="display: none;"><a id="logout-link" href="../logout.php">Log out</a></li>
        </ul>
        <form>
            <input type="text" placeholder="Search" aria-label="Search">
            <button type="submit">Search</button>
        </form>
    </nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Näytä linkki vain, jos käyttäjä on kirjautunut sisään
        const isLoggedIn = <?php echo isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? 'true' : 'false'; ?>;
        const logoutLi = document.getElementById('logout-li');
        if (isLoggedIn) {
            logoutLi.style.display = 'block';
        } else {
            logoutLi.style.display = 'none';
        }
    });
</script>

    <?php
    session_start();

    // Tarkista, onko käyttäjä kirjautunut sisään
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet kirjautumissivulle
    header("location: login.html");
    exit;
}
?>
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