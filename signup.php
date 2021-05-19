<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */
?>

<?php
require(__DIR__ . '/app/core/header.php');

$config = new Config;
$config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');

ob_start();
if (!$config->get("site.showSignUpPage")){
    header("Location:login.php");
}
ob_flush();

?>


<div class="login">

    <h1>Create Account</h1>
        <?php
        $user = new User;


        if(isset($_POST['signupButton'])){


            //something was posted
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $level = 0;


            //Save to database
            $user->create($username,$firstname,$lastname,$password,$email,$level);
        }
        ?>
    <form action="" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="firstname">
            <i class="fas fa-signature"></i>
        </label>
        <input type="text" name="firstname" placeholder="Firstname" id="firstname" required>
        <label for="lastname">
            <i class="fas fa-signature"></i>
        </label>
        <input type="text" name="lastname" placeholder="Lastname" id="lastname" required>

        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
        <input type="text" name="email" placeholder="Email" id="email" required>

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>

        <input type="password" name="password" placeholder="Password" id="password" required>


        <a href="login.php">Already have an account? login here!</a>
        <input type="submit" value="Create Account" id="signupButton" name="signupButton">

    </form>
</div>

<?php require(__DIR__ . '/app/core/footer.php') ?>

