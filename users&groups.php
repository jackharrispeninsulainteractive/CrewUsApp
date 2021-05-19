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
//Check for valid user level and redirect is the user is not an admin
ob_start();
if(!$user_data['user_level'] == 1){
    header("Location: index.php");
}else{
}

ob_flush();


if (isset($_POST['removeUser'])){
    $removeUser = $_GET['user'];
  $user->delete($removeUser,"users&groups.php");
}
   ?>

    <div class="container">

        <h1 class="heading1"><i class="fas fa-users" style="font-size: 1em"></i> Users & Groups</h1>

        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <br>

        <h5>All Users</h5>
        <br>
        <form action="" method="post">
            <button type="button" class="btn" name="createUser" id="createUser" data-bs-toggle="modal" data-bs-target="#createUserModal"
                    style="background-color: <?php echo $config->get("theme.button-background","")?>; color: <?php echo $config->get('theme.button-text','')?>;" >
                Create User
            </button>

        </form>

        <br>

        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Username</th>
                <th scope="col">Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Permissions</th>
                <th scope="col">Date Created</th>
                <th scope="col">Functions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql = "SELECT * from ab_users";
                $database = new Database();
                $rows = $database->fetch($sql);

                foreach($rows as $row) {
                ?>
                <td><p><img src="<?php echo $row[8]?>" alt="<?php echo $row[8]?>" style="max-height: 48px;
                border-radius: 50%;"></p></td>
                <td><p><?php echo $row[3];?></p></td>
                <td><p><?php echo $row[4];?> <?php echo $row[5];?></p></td>
                <td><p><?php echo $row[7];?></p></td>
                <td><p><?php if($row[2] == 1){
                            echo "Administrator";
                }else{echo "Standard User";
                        }?></p></td>
                <td><p><?php echo $row[9];?></p></td>
                <td>
                    <form action="" method="post">

                        <?php
                        if(isset($_GET['user'])) {
                            $userSelected = $_GET['user'];
                                if($userSelected == $row[3]){
                                echo '<button type="button" class="btn button" name="editUser" id="editUser" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                  <i class="fas fa-user-edit"></i> Edit
                                 </button>';
                                    echo '<button type="submit" class="btn btn-danger" name="removeUser" id="removeUser">
                                 <i class="fas fa-trash-alt"></i>
                                 </button>';

                                }else{
                                    echo "<a href='users&groups.php?user=$row[3]' class='btn button'><i class='fas fa-mouse-pointer'></i> Select</a>";
                                }
                        }else{
                            echo "<a href='users&groups.php?user=$row[3]' class='btn button'><i class='fas fa-mouse-pointer'></i> Select</a>";
                        }
                        ?>
                    </form>
                  </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <br>

        <h5>Groups</h5>

        <br>
        <form action="" method="post">
            <button type="button" class="btn" name="createGroup" id="createGroup" data-bs-toggle="modal" data-bs-target="#createGroupModal"
                    style="background-color: <?php echo $config->get("theme.button-background","")?>; color: <?php echo $config->get('theme.button-text','')?>" >
                Create Group
            </button>
        </form>
        <table class="table">
            <thead>
            <tr></th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Administrator</th>
                <th scope="col">Members</th>
                <th scope="col">Created By</th>
                <th scope="col">Date Created</th>
                <th scope="col">Functions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql = "SELECT * from ab_groups";
                $database = new Database();
                $rows = $database->fetch($sql);

                foreach($rows as $row) {
                ?>
                <td><p><?php echo $row[2];?></p></td>
                <td><p><?php echo $row[3];?></p></td>
                <td><p><?php echo $row[4];?></p></td>
                <td><p>NOT ADDED</p></td>
                <td><p><?php echo $row[5];?></p></td>
                <td><button data-id="<?php echo $row[1] ?>" type="button" class="btn" name="updateWindow" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="background-color: <?php echo $config->get("theme.button-background","")?>; color: <?php echo $config->get('theme.button-text','')?>" >
                        Edit Group
                    </button></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <!-- Modal Create Group-->
        <div class="modal fade" id="createGroupModal" tabindex="-1" aria-labelledby="createGroupModal" aria-hidden="true">
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/app/modals/createGroupModal.php') ?>
        </div>
        <!-- Modal Create User-->
        <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/app/modals/createUserModal.php') ?>
        </div>
        <!-- Modal Edit User-->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/app/modals/editUserModal.php') ?>
        </div>

    </div>



<?php require(__DIR__ . '/app/core/footer.php') ?>