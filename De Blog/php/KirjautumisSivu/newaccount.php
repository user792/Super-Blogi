<?php include_once 'inc/header.php'; ?>
    <h1>Tee account</h1>
    <form action="" method="post">

  
        
        <div class="container">
            <p>Get SMB updates</p>
            <h2>Welcome, Sign up</h2>

            
            <form action="actions/signup.php">
                <label for="user_password"><b>Username</b></label>
                <input name="user_username"type="text" placeholder="Enter Username" required>
                <br>
                <label for="user_password"><b>Password</b></label>
                <input name="user_password"type="password" placeholder="Enter Password" required>
                <br>
                <button type="submit">Sign up</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </form>
        </div>





        <div class="container" style="background-color: #f1f1f1;">
            <span class="psw">Already got an <a href="index.php">account</a>?</span>
        </div>
    </form>
    <?php include_once 'inc/footer.php'; ?>