<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = ""; // Change this according to your setup
$dbname = "markoblog";



$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die("Unable to connect with database" . mysqli_connect_error());
}
?>