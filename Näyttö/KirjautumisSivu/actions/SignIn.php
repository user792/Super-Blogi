<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";


if(isset($_POST['signin'])){

    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
        
    
    login($conn, $usersname, $pssword);
    

}else{
    exit();
}

?>