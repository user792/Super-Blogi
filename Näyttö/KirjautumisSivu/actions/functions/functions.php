<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";


function singupFieldEmpty($usersname, $pssword){
    $result;
    if(empty($usersname) || empty($pssword)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function notValidUsersname($usersname){
    $result;
    if(!filter_var($usersname, FILTER_VALIDATE_EMAIL)){

    }else{
        $result = false;
    }
}

function usersnameExist($conn, $usersname){
    $sql = "SELECT * FROM users WHERE usersname =?";
    $stmt = mysqli_stmt_init ($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //Lokaatio tähän
        exit()
    }
    mysqli_stmt_bind_param($stmt, 's', $usersname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $result = mysqli_stmt_num_rows($stmt) > 0;

    mysqli_stmt_close($stmt);
    return $result;
}

function createAccount($conn, $usersname, $pssword){
    $sql = "INSERT INTO users (usersname, pssword) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn)
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //Lokaatio tähän
        exit()
    }

    mysqli_stmt_bind_param($stmt, 'ss', $usersname, $pssword);
    mysqli_stmt_execute($stmt);

    session_start();
    $_SESSION['Username'] = $usersname;
    mysqli_stmt_close($stmt);
    //Ohjattavalle sivulle lokaatio
    exit();

}

login($conn, $usersname, $pssword){
    $sql = "SELECT * FROM users WHERE usersname =?";
    $stmt = mysqli_stmt_init ($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //Lokaatio tähän
        exit()
    }


    mysqli_stmt_bind_param($stmt, 's', $usersname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$row = mysqli_fetch_assoc($result)){
        mysqli_stmt_close($stmt);
        //Eri lokaatio tähän
        exit();
    }

    session_start();
    $_SESSION['username'];
    $_SESSION['userid'] = $row['id'];
    mysqli_stmt_close($stmt);
    //Eri lokaatio tähän
}

?>