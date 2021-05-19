<div class="modal-dialog">
    <div class="login">
        <div class="modal-content">
            <h1>Create User</h1>
            <?php


            $user = new User;


            if(isset($_POST['createUserButton'])){

                //something was posted
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $level = $_POST['userlevel'];




                //Save to database
                $user->create($username,$firstname,$lastname,$password,$email,$level);
                header("Location:users&groups.php");
            }


            ?>
            <div class="modal-body">
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
                    <label for="userlevel">
                        <i class="fas fa-user-shield"></i>
                    </label>

                    <select name="userlevel" id="userlevel" style="width:19.5em;">
                        <option value="0">Standard</option>
                        <option value="1">Administrator</option>
                    </select>
                    <input type="submit" value="Create Account" id="createUserButton" name="createUserButton">

                </form>
            </div>

        </div>

    </div>
</div>