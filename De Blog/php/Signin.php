<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirjautumis Sivu</title>
    <link rel="stylesheet" href="../CSS/signin.css">
</head>
<body>
    <div class="kysely">
        <h1>Kirjaudu Sisään</h1>
        <form action="actions/signin.php" method="post">
            <?php
            


            ?>
            <div class="imgcontainer">

            </div>
            
            <div class="container">
                <label for="uname"><b>Käyttäjänimi</b></label>
                <input type="text" class="textbox" placeholder="Käyttäjänimi" name="Uname" required>
                <br>
                <label for="psw"><b>Salasana</b></label>
                <input type="password" class="textbox" placeholder="Salasana" name="psw" required>
                <br>
                <button type="submit" class="login">Kirjaudu</button>
               

            </div>

            <div class="container" id="bottomshit">
                <button type="button" class="cancelbtn"><a href="./Home.php">peruuta</a></button>
                <span class="psw">Forgot <a href="#">password</a></span>
            </div>
        </form>
    </div>
</body>
</html>
