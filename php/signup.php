<?php
include("./connect.php"); // Yhdistä tietokantaan

// Saadaan käyttäjän syöttämät tiedot
$fName = isset($_POST["fName"]) ? $_POST["fName"] : "";
$lName = isset($_POST["lName"]) ? $_POST["lName"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Tarkistetaan, onko käyttäjänimi jo käytössä
$query = "SELECT * FROM users WHERE username=?";
$stmt = mysqli_prepare($yhteys, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Käyttäjänimi on jo käytössä, annetaan virheilmoitus tai tehdään jotain muuta tarvittavaa
    echo "Käyttäjänimi on jo käytössä!";
} else {
    // Käyttäjänimi on uniikki, lisätään käyttäjä tietokantaan

    // Salataan salasana ennen sen tallentamista tietokantaan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Määritellään tietokantakysely käyttäjän lisäämiseksi
    $sql = "INSERT INTO users (fName, lName, email, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql);

    // Sidotaan muuttujien arvot valmisteltuun kyselyyn
    mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $email, $username, $hashed_password);

    // Suoritetaan kysely
    mysqli_stmt_execute($stmt);

    // Suljetaan tietokantayhteys
    mysqli_close($yhteys);

    // Ohjataan käyttäjä kirjautumissivulle
    header("Location:../pages/login.html");
    exit;
}
?>
