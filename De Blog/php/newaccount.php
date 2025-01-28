<?php include_once 'inc/header.php'; ?>
    <div class="kysely">
        <h1>Tee käyttäjä</h1>
        <form action="./actions/signup.php" method="post">

    
            
            <div class="container">

        <?php
        if(isset($_GET['err'])){
            $error = $_GET['err'];
            if($error == 'username-exists'){
                echo"<p style='color:red;'>Käyttäjä nimi on jo viety.</p>";
            }else if($error == 'stmtfailed'){
                echo"<p style='color:red;'>Virhe</p>";
            }
        
        }
        ?>
                
                
                <label for="user_password"><b>Käyttäjänimi</b></label>
                <input name="user_username" class="textbox" type="text" placeholder="Käyttäjänimi" required>
                <br>
                <label for="user_password"><b>Salasana</b></label>
                <input name="user_password" class="textbox" type="password" placeholder="Salasana" required>
                <br>
                <button type="submit" name="signup">Rekisteröidy</button>


            </div>





            <div class="container" id="bottomshit">
                <button type="button" class="cancelbtn"><a href="./Home.php">Peruuta</a></button>
                <span class="psw">On jo <a href="index.php">käyttäjä</a>?</span>
            </div>
        </form>
    </div>
    <?php include_once 'inc/footer.php'; ?>
