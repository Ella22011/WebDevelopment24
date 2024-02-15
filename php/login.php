<?php
session_start(); // Aloita istunto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkista, että käyttäjänimi ja salasana on lähetetty lomakkeesta
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Yhdistä tietokantaan
        include("connect.php");

        // Suojaudu SQL-injektiolta
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);

        // Tarkista käyttäjän tiedot tietokannasta
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection, $query);

        // Jos käyttäjä löytyy, ohjaa eteenpäin
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["username"] = $username; // Tallenna käyttäjänimi istuntoon
            header("Location: welcome.php"); // Ohjaa eteenpäin onnistuneen kirjautumisen jälkeen
        } else {
            $error = "Invalid username or password"; // Näytä virheviesti
        }

        // Sulje tietokantayhteys
        mysqli_close($connection);
    }
}
?>