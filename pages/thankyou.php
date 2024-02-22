<?php
session_start();

$donate_page = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? "./donate.php" : "./donatepage.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="../css/styles-jemina.css">
</head>
<body>
<nav id="main-nav">
    <ul>
      <li>
        <a class="navbar-brand" href="../index.html">
          <img src="../images/catLogo.png" alt="logo" height="50" width="auto">
        </a>
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
  <div class="header">
    <h1>Thank you for your donation!</h1>
    <p>We greatly appreciate your generosity.</p>
    <img src="../images/kisukuva.jpg" class="thankyouimg" alt="Laying cat">
</div>
<footer class="footer">
  <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">
  </footer>
</body>
</html>