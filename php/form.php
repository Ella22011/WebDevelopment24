<?php
include("./connect.php");
?>

<?php
if (isset($_POST["fName"])){
    $fName=$_POST["fName"];
}
else{
    $fName="";
    header("Location:donate.html");
    exit;
}

if (isset($_POST["lName"])){
    $lName=$_POST["lName"];
}
else{
    $lName= "";
    header("Location:donate.html");
    exit;
}

if (isset($_POST["email"])){
    $email=$_POST["email"];
}
else{
    $email= "";
    header("Location:donate.html");
    exit;
}

if (isset($_POST["donation"])){
    $donation=$_POST["donation"];
}
else{
    $donation= "";
    header("Location:donate.html");
    exit;
}

if (isset($_POST["paymentMethod"])){
    $paymentMethod=$_POST["paymentMethod"];
}
else{
    $paymentMethod= "";
    header("Location:donate.html");
    exit;
}

if (isset($_POST["donationDate"])){
    $donationDate=$_POST["donationDate"];
}
else{
    $donationDate= "";
    header("Location:donate.html");
    exit;
}

$yhteys = mysqli_connect("localhost", "trtkp23_15", "nKudfqeT");

if (!$yhteys){
    die("Connection Error: " . mysqli_connect_error());
}

$tietokanta=mysqli_select_db($yhteys,"lahjoitustietokanta");
if (!$tietokanta){
    die("Error selecting Database: " . mysqli_connect_error());
}
echo"Database OK";

$sql="insert into nimet(fName, lName, email) values(?,?,?)";
$sql="insert into lahjoitukset(donation, paymentMethod, donationDate) values(?,?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $fName, $lName, $email);
mysqli_stmt_bind_param($stmt, 'dsd', $donation, $paymentMethod, $donationDate);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);





?>

