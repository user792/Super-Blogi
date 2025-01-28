<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";


function signupFieldEmpty($usersname, $pssword){
    $result;
    if(empty($usersname) || empty($pssword)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}



function usersnameExist($conn, $usersname){
    $sql = "SELECT * FROM users WHERE name =?";
    $stmt = mysqli_stmt_init ($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../newaccount.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 's', $usersname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $result = mysqli_stmt_num_rows($stmt) > 0;

    mysqli_stmt_close($stmt);
    return $result;
}


function createAccount($conn, $usersname, $pssword){
    $sql = "INSERT INTO users (name, pass) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../newaccount.php?err=stmtfailed");
        exit();
    }

    //$passHashed = password_harsh($pssword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ss', $usersname, $pssword);
    mysqli_stmt_execute($stmt);

    session_start();
    $_SESSION['Username'] = $usersname;
    mysqli_stmt_close($stmt);
    header("Location: ../home.php");
    exit();

}

function login($conn, $usersname, $pssword){
    $name = $conn->real_escape_string($_POST['name'] = $usersname);
    $pass = $conn->real_escape_string($_POST['password'] = $pssword);

    $sql = "SELECT id, Name, writer FROM users WHERE Name = '$name' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['username'] = $row['name'];
        $_SESSION['userid'] = $row['id'];
        header("Location: ../Home.php");
        exit();
    } else {
        $error = "Antamasi Käyttäjänimi ja salasana eivät täsmää.";
    }

}



?>
