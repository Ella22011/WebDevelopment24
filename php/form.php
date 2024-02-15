<?php
include ("./connect.php");
?>

<?php

$fName=isset($_POST["fName"]) ? $_POST["fName"] :"";
$lName=isset($_POST["lName"]) ? $_POST["lName"] :"";
$email=isset($_POST["email"]) ? $_POST["email"] :"";
$donation=isset($_POST["donation"]) ? $_POST["donation"] : 0;
$paymentMethod=isset($_POST["paymentMethod"]) ? $_POST["paymentMethod"] :"";
$donationDate=isset($_POST["donationDate"]) ? $_POST["donationDate"] :"";

if (empty($fName) || empty($lName) || empty($email) || empty($donation) || empty($paymentMethod) || empty($donationDate)){
    header("Location:../pages/donate.html");
    exit;
}

$sql="insert into kissalahjoitukset (fName, lName, email, donation, paymentMethod, donationDate) values (?, ?, ?, ?, ?, ?)";

$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'sssisd', $fName, $lName, $email, $donation, $paymentMethod, $donationDate);

mysqli_stmt_execute($stmt);

mysqli_close($yhteys);


?>
