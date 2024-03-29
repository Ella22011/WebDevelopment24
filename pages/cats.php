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
  <title>Cat Distribution System - Cats</title>
  <link rel="stylesheet" href="../css/styles-jemina.css">
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

  <div class="header">
    <h1>Cats Available for Adoption</h1>
    <p>We kindly request handling adoption matters exclusively via email at <a
        href="mailto:info@catdistribution.com">info@catdistribution.com</a>. The phone line for Cat Distribution is
      primarily reserved for urgent situations involving found cats.</p>
    <p><strong>Please consider donating, all donations go towards our mission to give homeless cats loving homes.</strong>
    </p>
  </div>

  <main class="catspage">
    <div class="card">
      <img src="../images/Alex.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Alex, 9</b></h4>
        <p>Meet Alex, a charming companion with a heart as warm as his fur. This senior kitty brings a sense of calm and
          contentment to any home.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Cleo.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Cleo, 4</b></h4>
        <p>Here is Cleo, a delighful 4-year-old ready to bring joy and companionship into your home. She is ready to
          share her love and become a cherished member of your household.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Crawl1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Crawl, 6 months</b></h4>
        <p>Crawl is an adorable little kitten with a heart as playful as their boundless energy. If you're looking to
          add a bundle of joy and laughter to your home, consider adopting Crawl.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Gizmo1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Gizmo, 5</b></h4>
        <p>Here is Gizmo, a little grumpy, but behind that tough exterior lies a kitty with a story to tell. If you're
          ready to welcome a companion with a unique personality and a touch of grumpiness, consider adopting Gizmo.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Luna1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Luna, 8</b></h4>
        <p>Meet Luna, the regal 8-year-old with a heart as timeless as her graceful demeanor. This wise and
          sophisticated cat is seeking a home where she can share her gentle purrs and bring an air of refinement to her
          surroundings.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Mima1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Mima, 7</b></h4>
        <p>Here is Mima, the delightful 7-year-old with a playful spirit and a heart full of love. Mima is looking for a
          forever home where she can share her playful antics and receive the love she wholeheartedly gives.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Oliver.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Oliver, 3</b></h4>
        <p>Meet Oliver, the spirited 3-year-old cat with a heart as adventurous as his playful nature. If you're ready
          to embrace the joy and spontaneity that Oliver brings, consider making him a part of your family.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Oreo2.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Oreo, 6</b></h4>
        <p>Meet Oreo, the delightful 6-year-old cat with a charming black-and-white coat that mirrors his equally
          endearing personality. If you're ready to open your heart to a cat who's as sweet as his name suggests,
          consider welcoming Oreo into your home.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Pepper1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Pepper, 7</b></h4>
        <p>We'd like to introduce you to the amazing Pepper, a 7-year-old cat with a heart full of joy and a dash of
          spiciness! Come meet this charming kitty and let the magical journey begin. Pepper can't wait to find a loving
          family to call her own.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Shadow1.png" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Shadow, 4</b></h4>
        <p>Shadow is a captivating 4-year-old friend with a heart full of joy and a dash of mystery. Meet Shadow and
          embark on a magical journey together! </p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Tito1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Tito, 6</b></h4>
        <p>Tito is a handsome 6-year-old cat with a heart as mature as his sleek coat. If you're ready to open your
          heart and home to a sophisticated and easygoing companion, Tito is waiting to meet you.</p>
      </div>
    </div>

    <div class="card">
      <img src="../images/Whiskers1.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Whiskers, 2</b></h4>
        <p>Meet Whiskers, a delightful 2-year-old cat with a name that perfectly suits his charming appearance. Adopt
          this lovable cat and embark on a journey filled with discovery, affection, and the delightful presence of a
          charming whiskered friend.</p>
      </div>
    </div>

    <div class="last-card">
      <img src="../images/Zorro.jpg" alt="Avatar" style="width:100%">
      <div class="container">
        <h4><b>Zorro, 2</b></h4>
        <p>Introducing Zorro: The playful Maverick ready to enchant your home! Embrace the thrill of companionship and
          adopt Zorro today.</p>
      </div>
    </div>

    <img src="../images/websiteDividerPic.png" class="websiteDivider" alt="Pawprints">
  </main>

  <footer class="footer">
    <a href="#main-nav">Back to top</a>
  </footer>

</body>

</html>