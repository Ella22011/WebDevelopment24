<?php
session_start(); // Aloita istunto
include("./connect.php"); // Sisällytä tietokantayhteys

// Tarkista, onko käyttäjä jo kirjautunut sisään
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: ../pages/donate.html"); // Ohjaa donate.html-sivulle
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkista, onko käyttäjätunnus ja salasana lähetetty lomakkeesta
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Puhdista ja paikanna käyttäjätunnus ja salasana SQL-injektioiden estämiseksi
        $username = mysqli_real_escape_string($yhteys, $_POST["username"]);
        $password = mysqli_real_escape_string($yhteys, $_POST["password"]);

        // Hae käyttäjän tiedot tietokannasta
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($yhteys, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Tarkista salasana
            if (password_verify($password, $user['password'])) {
                // Tallenna käyttäjänimi istuntoon
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = true;

                // Ohjaa käyttäjä donate.html-sivulle
                header("Location: ../pages/donate.html");
                exit();
            }
        }

        $_SESSION['error'] = "Invalid username or password"; // Aseta virheilmoitus
    } else {
        $_SESSION['error'] = "Please enter username and password"; // Aseta virheilmoitus
    }

    // Sulje tietokantayhteys
    mysqli_close($yhteys);
}

// Ohjaa takaisin kirjautumissivulle virheilmoituksella
header("Location: ../pages/login.html");
exit();
?>
