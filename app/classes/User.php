<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */

class User
{
    private InterfaceAlert $alert;
    private Config $config;
    private string $uploadDirectory = "./uploads/userphotos";


    function __construct(){
        $this->alert = new InterfaceAlert(); //create alert object for class to use
        $this->config = new Config;
        $this->config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');
    }


    public function create($username,$firstname,$lastname,$password,$email,$level){
        //Generate random user ID number - 10**6 is 10 to the power of 6
        $user_id = rand(1, 10**6);
        $photo = "./uploads/userphotos/user.png";
        //SQL command to enter create user data
        $sql = "INSERT INTO ab_users (user_id, user_name, user_firstname, user_lastname,user_password, user_email, user_photo, user_level) VALUES ('$user_id','$username','$firstname','$lastname','$password','$email','$photo','$level')";

        //Create database instance
        $database = new Database();
        //run query command and pass SQL for main user data
        $database->query($sql);

        //redirect user
       header("Location: login.php");
    }

    public function update($user_id,$username,$firstname,$lastname,$password,$email,$level,$redirect){

        $sql = "UPDATE ab_users SET user_name='$username',user_firstname='$firstname',user_lastname='$lastname',user_password='$password',user_email='$email',user_level='$level' WHERE user_id='$user_id'";
        $database = new Database();
        $database->query($sql);
        header("Location: $redirect");
    }

    public function delete($username,$redirect){
        $sql = "DELETE FROM ab_users WHERE user_name='$username'";
        $database = new Database();
        $database->query($sql);
        header("Location: $redirect");
    }


    public function login($username, $password){

        //SQL command to enter create user data
        $sql = "SELECT * from ab_users where user_name = '$username' limit 1";

        //Create database
        $database = new Database();
        //run query command and pass SQL
        $result = $database->query($sql);

        //fetch the associated data for that result
        while($row = $result->fetch_assoc()){
            if($password === $row['user_password']){

                $_SESSION['user_id'] = $row['user_id'];
                $this->alert->create("User Logged In","success");
                header("Location: index.php");
            }

        }
       $this->alert->create("Login Failed","error");


    }

    public function photo($image,$user_id)
    {
            if (is_uploaded_file($image["tmp_name"])){


            // Check if image file is a actual image or fake image
            if ($image) {
                $check = getimagesize($image["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->alert->create("File is not an image.", "error");
                    $uploadOk = 0;
                }
            }

            $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            $target_file = $this->uploadDirectory . "/$user_id" . ".png";


            if ($uploadOk != 0 && $_FILES["fileToUpload"]["size"] > $this->config->get("site.maxUploadSize","")) {
                $this->alert->create("Sorry, your file is too large.", "error");
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($uploadOk != 0 && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $this->alert->create("Sorry, only JPG, JPEG, PNG files are allowed.", "error");
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {

                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    $database = new Database();
                    $sql = "UPDATE ab_users SET user_photo='$target_file' WHERE user_id='$user_id'";;
                    $database->query($sql);

                    $this->alert->create("The file " . htmlspecialchars(basename($image["name"])) . " has been uploaded.", "success");

                } else {
                    $this->alert->create("Sorry, there was an error uploading your file.", "error");
                }
            }
        }
    }

    public function getUserData($username){
        $sql = "select * from ab_users where user_name = '$username' limit 1";
        $database = new Database();
        $result = $database->query($sql);

        if ($result && $result->num_rows > 0){
            return $result->fetch_assoc();
        }
    }

    public function checkSession(): ?array
    {
        //check if the Session User ID is set
        if(isset($_SESSION['user_id'])){
            //if so then set a local variable of ID to the same as the current Session User is
            $id = $_SESSION['user_id'];
            //now perform a SQL lookup to check the user is is valid
            $sql = "select * from ab_users where user_id = '$id' limit 1";
            $database = new Database();
            $result = $database->query($sql);

            if ($result && $result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        header("Location: login.php");
        exit;
    }


}