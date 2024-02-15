<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$init = parse_ini_file("./.ht.asetukset.ini");

try{
    $yhteys=mysqli_connect("localhost", "trtkp23_15", "nKudfqeT", "web_trtkp23_15");
}
catch(Exception $e){
    header("Location:../pages/yhteysvirhe.html");
    exit;
}

?>
