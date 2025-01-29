<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "markoblog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}else{
    $user_id = $_SESSION['user_id'];
    $pfp = $user_id % 55;
    $pp = "../pp/$pfp.png";
    }

    

//(id / 55 - id // 55) * 55
// Get logged-in user's information0
$logged_in_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profiili</title>
    <link rel="stylesheet" href="../CSS/profiili.css">
    
</head>
<body>
<div class="nav">
            <table>
                <tr>
                    <th>
                        <a class="nav-button" href="./Home.php">koti</a>
                    </th>
                    <th>
                        <a class="nav-button" href="./index.php">login</a>
                    </th>
                    <th>
                        <a class="nav-button" href="./newaccount.php">signup</a>
                    </th>
                </tr>
            </table>
        </div>
        <!-- Käyttäjän profiilikuva-->
         <?php 

         ?>
        <img class="kuva" src="<?php echo $pp ?>" >
        
    <!-- Käyttäjän käyttäjänimi-->
    <h1><?= htmlspecialchars($logged_in_user) ?></h1>
</body>
</html>
<?php


?>
