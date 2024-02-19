<?php
session_start(); // Start the session
include("./connect.php"); // Include database connection

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$donation_amount = isset($_POST["donation_amount"]) ? $_POST["donation_amount"] : 0;
$paymentMethod = isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] : "";
$donationDate = isset($_POST["donationDate"]) ? $_POST["donationDate"] : "";

// Validate form data
if (empty($username) || empty($donation_amount) || empty($paymentMethod) || empty($donationDate)) {
    $_SESSION['error'] = "Please fill in all required fields.";
    header("Location: ../pages/donate.html");
    exit;
}

// Insert donation into the database
$sql = "INSERT INTO kissalahjoitukset (username, donation_amount, paymentMethod, donationDate) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($yhteys, $sql);

if (!$stmt) {
    $_SESSION['error'] = "Error: Database connection error.";
    header("Location: ../pages/yhteysvirhe.html");
    exit;
}

mysqli_stmt_bind_param($stmt, 'siss', $username, $donation_amount, $paymentMethod, $donationDate);

if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Error: Unable to process donation.";
    header("Location: ../pages/yhteysvirhe.html");
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

$_SESSION['success'] = "Thank you for your donation!";
header("Location: ../pages/thankyou.html");
exit;
?>
