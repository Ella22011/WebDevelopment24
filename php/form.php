<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Jos käyttäjä ei ole kirjautunut sisään, ohjataan kirjautumissivulle
    header("Location: ../pages/login.php");
    exit;
}

// Tarkista, onko tarvittavat tiedot saatu lomakkeelta
if (isset($_POST["donation_amount"]) && isset($_POST["paymentMethod"]) && isset($_POST["donationDate"])) {
    $donation_amount = $_POST["donation_amount"];
    $paymentMethod = $_POST["paymentMethod"];
    $donationDate = $_POST["donationDate"];
    // Haetaan käyttäjänimi istunnosta
    $username = $_SESSION["username"];
} else {
    // Jos tarvittavia tietoja ei ole saatu, ohjataan lahjoitussivulle
    header("Location:../pages/donate.html");
    exit;
}

include("./connect.php"); // Yhdistä tietokantaan

// Haetaan user_id käyttäjänimen perusteella
$user_query = "SELECT user_id FROM users WHERE username = ?";
$user_stmt = mysqli_prepare($yhteys, $user_query);
mysqli_stmt_bind_param($user_stmt, "s", $username);
mysqli_stmt_execute($user_stmt);
mysqli_stmt_bind_result($user_stmt, $user_id);
mysqli_stmt_fetch($user_stmt);
mysqli_stmt_close($user_stmt);

// Tallennetaan tiedot tietokantaan
$sql = "INSERT INTO catdonations (user_id, username, donation_amount, paymentMethod, donationDate) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($yhteys, $sql);

// Tarkista, onnistuuko SQL-kyselyn suorittaminen
if ($stmt) {
    // Liitetään parametrit SQL-kyselyyn ja suoritetaan se
    mysqli_stmt_bind_param($stmt, "issss", $user_id, $username, $donation_amount, $paymentMethod, $donationDate);
    mysqli_stmt_execute($stmt);
    // Suljetaan SQL-kysely
    mysqli_stmt_close($stmt);
}

// Suljetaan tietokantayhteys
mysqli_close($yhteys);

// Ohjataan käyttäjä kiitos-sivulle
header("Location:../pages/thankyou.php");
exit;
?>