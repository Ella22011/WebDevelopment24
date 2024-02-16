<?php
session_start(); // Aloita istunto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkista, että käyttäjänimi ja salasana on lähetetty lomakkeesta
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Yhdistä tietokantaan
        include("./connect.php");

        // Suojaudu SQL-injektiolta
        $username = mysqli_real_escape_string($yhteys, $_POST["username"]);
        $password = mysqli_real_escape_string($yhteys, $_POST["password"]);

        // Tarkista käyttäjän tiedot tietokannasta
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($yhteys, $query);

        // Jos käyttäjä löytyy, ohjaa eteenpäin
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["username"] = $username; // Tallenna käyttäjänimi istuntoon
        } else {
            $error = "Invalid username or password"; // Näytä virheviesti
        }

        header("Location:../pages/donate.html"); // Ohjaa eteenpäin onnistuneen kirjautumisen jälkeen

        // Sulje tietokantayhteys
        mysqli_close($yhteys);


    }
}
?>