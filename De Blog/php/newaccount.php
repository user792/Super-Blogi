<?php include_once 'inc/header.php'; ?>
    <h1>Tee account</h1>
    <form action="/actions/signup" method="post">

  
        
        <div class="container">
            <p>Saa SMB päivityksiä</p>
            <h2>Tee käyttäjä</h2>

            
            
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
            <span class="psw">On jo<a href="index.php">käyttäjä</a>?</span>
        </div>
    </form>
    <?php include_once 'inc/footer.php'; ?>
