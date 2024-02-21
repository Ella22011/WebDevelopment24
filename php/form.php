<?php
include ("./connect.php");

// Otetaan lomakkeelta saadut tiedot
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$donation_amount = isset($_POST["donation_amount"]) ? $_POST["donation_amount"] : "";
$paymentMethod = isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] : "";
$donationDate = isset($_POST["donationDate"]) ? $_POST["donationDate"] : "";

// Alustetaan tyhjä lista puuttuvien kenttien virheilmoituksille
$missing_fields = [];

// Tarkistetaan, että kaikki tarvittavat tiedot ovat saatavilla
if (empty($username)) {
    $missing_fields[] = "Username";
}
if (empty($donation_amount)) {
    $missing_fields[] = "Donation Amount";
}
if (empty($paymentMethod)) {
    $missing_fields[] = "Payment Method";
}
if (empty($donationDate)) {
    $missing_fields[] = "Donation Date";
}

// Tarkistetaan, onko puuttuvia kenttiä
if (!empty($missing_fields)) {
    // Rakennetaan virheilmoitus puuttuvista kentistä
    $error_message = "Please fill in the following fields: " . implode(", ", $missing_fields);
    
    // Uudelleenohjataan käyttäjä lahjoitussivulle virheilmoituksen kanssa
    header("Location:../pages/donate.html?error=" . urlencode($error_message));
    exit;
}

// Tallennetaan tiedot tietokantaan
$sql = "INSERT INTO catdonations (user_id, username, donation_amount, paymentMethod, donationDate)
        SELECT u.user_id, ?, ?, ?, ?
        FROM users u
        WHERE u.username = ?";

$stmt = mysqli_prepare($yhteys, $sql);

// Tarkistetaan, onnistuuko SQL-kyselyn suorittaminen
if ($stmt) {
    // Liitetään parametrit SQL-kyselyyn ja suoritetaan se
    mysqli_stmt_bind_param($stmt, "siss", $username, $donation_amount, $paymentMethod, $donationDate);
    mysqli_stmt_execute($stmt);

    // Suljetaan SQL-kysely
    mysqli_stmt_close($stmt);
}


// Suljetaan tietokantayhteys
mysqli_close($yhteys);

// Ohjataan käyttäjä kiitos-sivulle
header("Location:../pages/thankyou.html");
exit;
?>

