<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$init = parse_ini_file("../pages/.ht.asetukset.ini");

$yhteys = mysqli_connect($init["palvelin"], $init["tunnus"], $init["pass"], $init["tk"]);

if (mysqli_connect_error()) {
    header("Location: ../pages/yhteysvirhe.html");
    exit;
}
?>
