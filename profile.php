<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/core/header.php') ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/core/nav-top.php') ?>
<?php

$user = new User;

//load config file
$config = new Config();
$config->load("./config.php");


$user_data = $user->checkSession();

?>
    <div class="container">

        <h1 class="heading1"><i class="fas fa-user-edit" style="font-size: 1em"></i> <?php echo $user_data['user_firstname']?> <?php echo $user_data['user_lastname']?></h1>
        <?php
        if(isset($_POST['updateButton'])) {



            $user_id = $user_data['user_id'];
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $level = $user_data['user_level'];
            $redirect = "profile.php";

            $user->update($user_id, $username, $firstname, $lastname,$password, $email, $level,$redirect);
        }
        ?>
        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <br>

        <h5>Your Details</h5>
        <form action="" method="post">
            <div class="profile" style="display: flex;flex-wrap: wrap; margin-left: -.5em">
                <div class="flex-item" style="padding: 0.5em">
                    <p>Username:</p>
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input style="height: 50px;" type="text" name="username" id="username" value="<?php echo $user_data['user_name']?>" required>
                </div>
                <div class="flex-item" style="padding: 0.5em">
                    <p>Fistname:</p>
                    <label for="firstname">
                        <i class="fas fa-signature"></i>
                    </label>
                    <input style="height: 50px;" type="text" name="firstname" value="<?php echo $user_data['user_firstname']?>" id="firstname" required>
                </div>
                <div class="flex-item" style="padding: 0.5em">
                    <p>Lastname:</p>
                    <label for="lastname">
                        <i class="fas fa-signature"></i>
                    </label>
                    <input style="height: 50px;" type="text" name="lastname" value="<?php echo $user_data['user_lastname']?>" id="lastname" required>
                </div>
                <div class="flex-item" style="padding: 0.5em">
                    <p>Email:</p>
                    <label for="email">
                        <i class="fas fa-envelope"></i>
                    </label>
                    <input style="height: 50px;" type="text" name="email" id="email" value="<?php echo $user_data['user_email']?>" required>
                </div>
            </div>
            <br>
            <h5>Password & Security</h5>
            <div class="profile" style="display: flex;flex-wrap: wrap; margin-left: -.5em">
                <div class="flex-item" style="padding: 0.5em">
                    <p>New Password:</p>
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input style="height: 50px;" type="password" name="password" value="<?php echo $user_data['user_password']?>" id="lastname" required>
                </div>
                <div class="flex-item" style="padding: 0.5em">
                    <p>Confirm New Password:</p>
                    <label for="password2">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input style="height: 50px;" type="password" name="password2" id="password2" value="<?php echo $user_data['user_password']?>" required>
                </div>
            </div>
            <br>
            <div class="profile"><input type="submit" value="Update Details" id="updateButton" name="updateButton"></div>
        </form>
        <br>
        <br>
        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <br>
        <h5>Profile Photo</h5>
        <div class="profile" style="display: flex;flex-wrap: wrap; margin-left: -.5em">

            <div class="flex-item" style="padding: 0.5em">
                <?php
                if(isset($_POST['updatePhotoButton'])){
                    $image = $_FILES['fileToUpload'];
                    $user_id = $user_data['user_id'];

                    $user->photo($image,$user_id);

                }?>
                <p>Max Upload Size: <?php echo $config->get("site.maxUploadSize","")/10**6;?>MB</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="updateImage">
                        <i class="fas fa-image"></i>
                    </label>
                    <input type="file" name="fileToUpload" id="fileToUpload" style="padding: 0.5em">
                    <br>
                    <input type="submit" value="Update Photo" id="updatePhotoButton" name="updatePhotoButton">
                </form>

            </div>
        </div>
        <br>
        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <br>
    </div>


<?php require(__DIR__ . '/app/core/footer.php') ?>