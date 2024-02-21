<?php
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
} else {
    header("Location:./pages/signup.html");
    exit;
}

include("./connect.php"); // Yhdistä tietokantaan

$sql = "SELECT * FROM users WHERE username=?";

$stmt = mysqli_prepare($yhteys, $sql);

// Tarkista, onko tietokantayhteys onnistunut
if ($stmt) {
    // Bindaa parametrit tietokantakyselyyn
    mysqli_stmt_bind_param($stmt, "s", $username);

    // Suorita tietokantakysely
    mysqli_stmt_execute($stmt);

    // Hae tietokantakyselyn tulos
    $result = mysqli_stmt_get_result($stmt);

    // Tarkista, onko rivejä palautettu
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Tarkista, vastaako annettu salasana hashattua salasanaa
        if (password_verify($password, $row['password'])) {
            // Aseta sessiomuuttuja osoittamaan, että käyttäjä on kirjautunut sisään
            $_SESSION["loggedin"] = true; // Asetetaan kirjautumistila
            $_SESSION["username"] = $username; // Asetetaan käyttäjänimi istuntoon tarvittaessa
            // Ohjaa käyttäjä donate.php-sivulle
            header("Location: ../pages/donate.php");
            // Lopeta tämän skriptin suoritus
            exit;
        }
    }
}

// Jos tänne päästään, käyttäjää ei löytynyt tai salasana oli väärä
echo "Invalid username or password";
?>