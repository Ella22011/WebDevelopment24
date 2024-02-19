<?php
include ("./connect.php");

$user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$donation_id = isset($_POST["donation_id"]) ? $_POST["donation_id"] : "";
$donation_amount = isset($_POST["donation_amount"]) ? $_POST["donation_amount"] : 0;
$paymentMethod = isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] : "";
$donationDate = isset($_POST["donationDate"]) ? date('Y-m-d', strtotime($_POST["donationDate"])) : "";

if (empty($user_id) || empty($username) || empty($donation_id) || empty($donation_amount) || empty($paymentMethod) || empty($donationDate)) {
    echo "<p style='color: red;'>Please fill in all required fields.</p>";
    exit;
}

$sql = "INSERT INTO kissalahjoitukset (user_id, username, donation_id, donation_amount, paymentMethod, donationDate) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($yhteys, $sql);

if (!$stmt) {
    echo "Error: Database connection error.";
    exit;
}

mysqli_stmt_bind_param($stmt, 'isiiss', $user_id, $username, $donation_id, $donation_amount, $paymentMethod, $donationDate);

if (!mysqli_stmt_execute($stmt)) {
    echo "Error: Unable to process donation.";
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

echo "Thank you for your donation!";
?>
