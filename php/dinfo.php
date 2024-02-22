<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Käyttäjä ei ole kirjautunut sisään, ohjataan kirjautumissivulle
    header("Location: ../pages/login.php");
    exit;
}

// Otetaan käyttäjän tunniste istunnosta
$user_id = $_SESSION["user_id"];

// Yhdistä tietokantaan
include("./connect.php");

// Valmistele SQL-kysely käyttäjän lahjoitusten hakemiseksi
$sql = "SELECT * FROM catdonations WHERE user_id = ?";
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Näytä käyttäjän lahjoitukset
while ($row = mysqli_fetch_assoc($result)) {
    echo "Donation ID: " . $row['donation_id'] . "<br>";
    echo "Amount: " . $row['donation_amount'] . "<br>";
    echo "Payment Method: " . $row['paymentMethod'] . "<br>";
    echo "Date: " . $row['donationDate'] . "<br>";
    echo "<br>";
}

// Sulje tietokantayhteys
mysqli_close($yhteys);
?>