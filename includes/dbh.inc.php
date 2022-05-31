<?php 

$dBUsername = "idathoet_com";
$dBPassword = "fxHBp2mG6Ezk";
$dBName = "idathoet_com_db_genbrugshallerne";
$serverName = "mysql32.unoeuro.com";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>