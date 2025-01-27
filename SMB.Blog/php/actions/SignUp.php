<?php



if(isset($_POST['signup'])){
    $usersname = $_POST['user_username'];
    $pssword = $_POST['user_password'];
    
    require_once "../inc/dbinc.php";
    include_once "./functions/functions.php";

    if(signupFieldEmpty($usersname, $pssword) !== false){
        header("Location: ../newaccount.php?err=fieldempty");
        exit();
    }

    if(usersnameExist($conn, $usersname)){
        header("Location: .../newAccount.php?err=username-exists");
        exit();
    }

    createAccount($conn, $usersname, $pssword);
}else{
    header("Location: ../index.php");
    exit();
}
?>
