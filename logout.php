<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */

session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
}

header("Location: login.php");