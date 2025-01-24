<?php include_once 'inc/header.php'; ?>
    <h1>Kirjaudu Sisään</h1>
    <form action="actions/signin.php" method="post">

        
        <div class="container">
            
            <h2>Tervettuloa ja kirjaudu</h2>
            <p>saat SMB päivityksiä</p>
            <label for="user_name"><b>Käyttäjänimi</b></label>
            <input type="text" class="textbox" placeholder="Käyttäjänimi" name="user_username" required>
            <br>
            <label for="user_password"><b>Salasana</b></label>
            <input type="password" class="textbox" placeholder="Enter Password" name="user_password" required>
            <br>
            <button type="submit">Kirjaudu</button>


        </div>

        <div class="container" id="bottomshit">
                <button type="button" class="cancelbtn"><a href="./Home.php">peruuta</a></button>
                <span class="psw"><a href="newaccount.php">Unohtuiko</a>?</span>
        </div>
    </form>
<?php include_once 'inc/footer.php'; ?>
