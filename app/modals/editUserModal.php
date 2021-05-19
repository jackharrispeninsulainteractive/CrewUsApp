<div class="modal-dialog">
    <div class="login">
        <div class="modal-content">
            <h1>Edit User</h1>
            <div class="modal-body">

                <?php
                if (isset($_GET['user'])){
                $userSelected = $_GET['user'];
                $user = new User();
                $userData = $user->getUserData($userSelected);

                if(isset($_POST['updateButton'])) {

                    //something was posted
                    $username = $_POST['username'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $level = $_POST['level'];
                    $redirect = "users&groups.php?user=$userSelected";

               $user->update($userData['user_id'],$username,$firstname,$lastname,$password,$email,$level,$redirect);
                }

                ?>

                <form action="" method="post">
                    <input type="hidden" name="user_id">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" name="username" value="<?php echo $userData['user_name']?>" id="username" required>

                    <label for="firstname">
                        <i class="fas fa-signature"></i>
                    </label>

                    <input type="text" name="firstname" value="<?php echo $userData['user_firstname']?>" id="firstname" required>

                    <label for="lastname">
                        <i class="fas fa-signature"></i>
                    </label>
                    <input type="text" name="lastname" value="<?php echo $userData['user_lastname']?>" id="lastname" required>

                    <label for="email">
                        <i class="fas fa-envelope"></i>
                    </label>
                    <input type="text" name="email" value="<?php echo $userData['user_email']?>" id="email" required>

                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>

                    <input type="password" name="password"  value="<?php echo $userData['user_password']?>" id="password">
                    <label for="level">
                        <i class="fas fa-user-shield"></i>
                    </label>
                    <select name="level" id="level" style="width:19.5em;">
                        <option <?php if($userData['user_level'] == 0){
                            echo 'selected="selected"';
                        }?>value="0">Standard</option>

                        <option value="1" <?php if($userData['user_level'] == 1){
                            echo 'selected="selected"';
                        }?>>Administrator</option>
                    </select>



                    <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
                    <br>

                    <input type="submit" value="Update User" id="updateButton" name="updateButton">

                </form>
            </div>
<?php }?>
        </div>

    </div>
</div>