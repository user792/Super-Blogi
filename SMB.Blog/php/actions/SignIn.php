<?php



if(isset($_POST['signin'])){
    $usersname = $_POST['user_username'];
    $pssword = $_POST['user_password'];
    
    require_once "../inc/dbinc.php";
    include_once "./functions/functions.php";

    if(signupFieldEmpty($usersname, $pssword) !== false){
        header("Location: ../newaccount.php?err=fieldempty");
        exit();
    }



    login($conn, $usersname, $pssword);
}else{
    header("Location: ../index.php");
    exit();
}
?>
