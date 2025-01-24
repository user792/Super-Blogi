<?php
// Start session
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

// Initialize error message
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $pass = $conn->real_escape_string($_POST['password']);

    // Query to check user credentials
    $sql = "SELECT id, Name, writer FROM users WHERE Name = '$name' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch user details
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['username'] = $user['Name']; // Store username in session
        $_SESSION['is_writer'] = $user['writer']; // Store writer status (0 or 1)

        // Redirect to the homepage
        header("Location: home.php");
        exit;
    } else {
        $error = "Antamasi Käyttäjänimi ja salasana eivät täsmää.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <link rel="icon" href="../Markoblog.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirjaudu sisään</title>
    <link rel="stylesheet" href="../CSS/signin.css">
</head>
<body>
    <div class="kysely">
        <h1>Kirjaudu sisään</h1>
        <form method="post" action="signin.php">
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <label for="name">Käyttäjänimi:</label><br>
            <input class="textbox" type="text" id="name" name="name" required><br><br>
            <label for="password">Salasana:</label><br>
            <input class="textbox" type="password" id="password" name="password" required><br><br>
            <button class="login" type="submit">Kirjaudu</button>
        </form>
        <div class="cancelbtn">
            <a href="./Home.php">Takaisin</a>
        </div>
    </div>
</body>
</html>
