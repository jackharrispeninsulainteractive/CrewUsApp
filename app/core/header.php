<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */
?>

<?php
//Load Required Class Files
require($_SERVER['DOCUMENT_ROOT'].'/app/classes/Config.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/classes/InterfaceAlert.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/classes/Database.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/classes/User.php');
require($_SERVER['DOCUMENT_ROOT'].'/app/classes/Group.php');

//create config instance
$config = new Config;
$config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title><?php echo $config->get("site.title","")?></title>
    <link rel="shortcut icon" type="image/x-icon" href='<?php echo $config->get("site.favicon","")?>'/>
    <!-- Core APP CSS -->
    <link rel="stylesheet" href='/app/core/theme.php'>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!--Chart.js JS CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>