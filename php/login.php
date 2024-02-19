<?php
session_start(); // Aloita istunto
$_SESSION["loggedin"] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkista, että käyttäjänimi ja salasana on lähetetty lomakkeesta
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Yhdistä tietokantaan
        include("./connect.php");

        // Suojaudu SQL-injektiolta
        $username = mysqli_real_escape_string($yhteys, $_POST["username"]);
        $password = mysqli_real_escape_string($yhteys, $_POST["password"]);

        // Tarkista käyttäjän tiedot tietokannasta
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($yhteys, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION["username"] = $username; // Tallentaa käyttäjänimen istuntoon
                $_SESSION["loggedin"] = true;
                header("Location: ../pages/donate.html"); // Ohjaa eteenpäin onnistuneen kirjautumisen jälkeen
                exit(); // Lisää tämä, jotta varmistetaan, että koodi ei jatka suoritusta tämän jälkeen
            } else {
                $error = "Invalid username or password"; // Näytä virheviesti
            }
        } else {
            $error = "Invalid username or password"; // Näytä virheviesti
        }

        // Sulje tietokantayhteys
        mysqli_close($yhteys);
    }
}
?>

<!-- HTML FORM -->
