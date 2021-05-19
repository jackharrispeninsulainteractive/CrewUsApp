<div class="modal-dialog">
    <div class="login">
        <div class="modal-content">
            <h1>Create Group</h1>
            <?php

            $user = new Group;

            $userData = $_SESSION['user_id'];

            if(isset($_POST['createGroupButton'])){

                //something was posted
                $name = $_POST['name'];
                $admin = $_POST['admin'];



            }


            ?>
            <div class="modal-body">
                <form action="" method="post">
                    <label for="name">
                        <i class="fas fa-signature"></i>
                    </label>
                    <input type="text" name="name" placeholder="Group Name" id="name" required>
                    <label for="admin">
                        <i class="fas fa-user-shield"></i>
                    </label>
                    </select>

                    <select name="admin" id="admin" style="width:19.5em;">
                        <?php

                        $sql = "SELECT * from ab_users";
                        $database = new Database();
                        $rows = $database->fetch($sql,true);

                        foreach($rows as $row) {
                            ?>
                            <option value="<?php echo $row[1];?>" <?php if($row[1] == $_SESSION['user_id']){echo 'selected="selected"';}?>"><?php echo $row[4];?> <?php echo $row[5];?></option>
                        <?php }?>
                    </select>


                    <input type="submit" value="Create Group" id="createGroupButton" name="createGroupButton">

                </form>
            </div>

        </div>

    </div>
</div>