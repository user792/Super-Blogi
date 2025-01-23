<?php include_once 'inc/header.php'; ?>
    <h1>Kirjaudu Sisään</h1>
    <form action="actions/signin.php" method="post">
        <?php
        


        ?>
        <div class="imgcontainer">

        </div>
        
        <div class="container">
            
            <h2>Welcome, Login</h2>
            <p>and get SMB updates</p>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="Uname" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>

        </div>

        <div class="container" style="background-color: #f1f1f1;">

            <span class="psw">Forgot <a href="newaccount.php">password</a>?</span>
        </div>
    </form>
<?php include_once 'inc/footer.php'; ?>