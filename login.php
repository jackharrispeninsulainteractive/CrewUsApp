<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */
?>

<?php require(__DIR__ . '/app/core/header.php') ?>
<div class="login">
    <?php
    $config = new Config;
    $config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');

    if ($config->get("theme.login-logo","") == "true"){
        $logo = $config->get("company.logo","");
        echo "<img src='$logo' alt='logo' class='loginLogo'>";
    }

    $siteTitle = $config->get("site.title","");
    echo "<h6 class='loginTitle '>$siteTitle</h6>"

    ?>
    <?php

    //start the session
    session_start();

    $user = new User;


    if(isset($_POST['loginButton'])){

        //something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Save to database
        $user->login($username,$password);

    }
    ?>
    <form action="" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>

        <input type="password" name="password" placeholder="Password" id="password" required>
        <?php
        if ($config->get('site.showSignUpPage')){
            echo ' <a href="signup.php">Create Account</a>';
        }?>

        <input type="submit" value="Login" id="loginButton" name="loginButton">

    </form>
</div>

<?php require(__DIR__ . '/app/core/footer.php') ?>


