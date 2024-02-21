<?php
include ("./connect.php");

$user_id=isset($_POST["user_id"]) ? $_POST["user_id"] :"0";
$username=isset($_POST["username"]) ? $_POST["username"] :"";
$donation_id=isset($_POST["donation_id"]) ? $_POST["donation_id"] : "0";
$sonation_amount=isset($_POST["donation_amount"]) ? $_POST["donation_amount"] :"";
$paymentMethod=isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] :"";
$donationDate = isset($_POST["donationDate"]) ? date('Y-m-d', strtotime($_POST["donationDate"])) : "";


if (empty($user_id) || empty($username) || empty($donation_id) || empty($paymentMethod) || empty($donationDate)){
    header("Location:../pages/donate.html");
    exit;
}
$sql="INSERT INTO kissalahjoitukset (user_id, username, donation_id, paymentMethod, donationDate) values (?, ?, ?, ?, ?)";

$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'isiiss', $user_id, $username, $donation_id, $paymentMethod, $donationDate);

mysqli_stmt_execute($stmt);

mysqli_close($yhteys);

header("Location:../pages/thankyou.html");

exit;
?>
