<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";



if(isset($_POST['signup'])){
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    



}else{
    header("Location: ../index.php");
    exit()
}
?>
