<?php 


if(isset($_POST['signin'])){

    $usersname = $_POST['user_username'];
    $pssword = $_POST['user_password'];



    
    login($conn, $usersname, $pssword);
    

}else{
    header("Location: ../index.php");
    exit();
}

?>
