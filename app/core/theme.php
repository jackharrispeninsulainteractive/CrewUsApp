<?php
header('Content-type: text/css; charset:UTF-8');

require($_SERVER['DOCUMENT_ROOT'].'/app/classes/Config.php'); //load config management class
$config = new Config; //create a config instance
$config->load($_SERVER['DOCUMENT_ROOT'].'/config.php'); //load the current config file
?>

* {
box-sizing: border-box;
font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
font-size: 16px;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}
body {
background-color: <?php $config->get("theme.background","")?>;
}
.login {
width: 400px;
background-color: #ffffff;
box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
margin: 100px auto;
}
.login h1 {
text-align: center;
color: #5b6574;
font-size: 24px;
padding: 20px 0 20px 0;
border-bottom: 1px solid #dee0e4;
}
.login form {
display: flex;
flex-wrap: wrap;
justify-content: center;
padding-top: 20px;
}
.login form label {
display: flex;
justify-content: center;
align-items: center;
width: 50px;
height: 50px;
background-color: <?php echo $config->get("theme.icon-accent-color","")?>;
color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
width: 310px;
height: 50px;
border: 1px solid #dee0e4;
margin-bottom: 20px;
padding: 0 15px;
}
.login form input[type="submit"] {
width: 100%;
padding: 15px;
margin-top: 20px;
background-color: <?php echo $config->get("theme.button-background","")?>;
border: 0;
cursor: pointer;
font-weight: bold;
color: <?php echo $config->get("theme.button-text","")?>;
transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
box-shadow: inset 0 0 100px 100px rgba(0, 0, 0, 0.1);
background-color: <?php echo $config->get("theme.button-background","")?>;
transition: background-color 0.2s;
}

.loginLogo{
max-width: <?php echo $config->get("theme.login-logo-maxsize","")?>;
display: block;
margin-left: auto;
margin-right: auto;
padding: 1em;
}

.loginTitle{
text-align: center;
text-align: center;
color: #5b6574;
font-size: 24px;
padding: 20px 0 20px 0;
border-bottom: 1px solid #dee0e4;
}

.navbar-custom {
box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3)!important;
}

.navbar-custom a{
color: <?php echo $config->get("theme.navbar-text-color","")?>;
}

.navbar-custom a:hover{
color: <?php echo $config->get("theme.navbar-text-color","")?>;
text-decoration: underline;
}

.navLogo{
max-height: <?php echo $config->get("theme.navbar-logo-maxheight","")?>;
}

.dropdown-menu{
background-color:<?php echo $config->get("theme.button-background","")?> !important;
}

.dropdown-menu a:hover{
background-color:<?php echo $config->get("theme.button-background","")?> !important;
}

.navbar-toggler-icon{
color: <?php echo $config->get("theme.navbar-text-color","")?> !important;
}

.navbar-photo{
margin-left: 1em;
margin-right: 1em;
max-height: 48px;
border-radius: 50%;
margin-top: -0.5em;
margin-bottom: -0.5em;
}

.navbar navbar-expand-lg navbar-custom{
box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
}


.image-center {
display: block;
margin-left: auto;
margin-right: auto;
width: 50%;
}

.heading1 {
color: #5b6574;
font-size: 32px;
padding: 20px 0 20px 0;
}

.profile label {
float: left;
display: flex;
justify-content: center;
align-items: center;
width: 50px;
height: 50px;
background-color: <?php echo $config->get("theme.icon-accent-color","")?>;
color: #ffffff;
}

.profile input[type="text"], .profile input[type="password"] {
padding: 0 15px;
height: 50px;
border: 1px solid #dee0e4;
}

.profile input[type="submit"] {
width: 20em;
padding: 1em;
margin: 1em;
background-color: <?php echo $config->get("theme.button-background","")?>;
border: 0;
cursor: pointer;
font-weight: bold;
color: <?php echo $config->get("theme.button-text","")?>;
transition: background-color 0.2s;
}

.button{
background-color: <?php echo $config->get("theme.button-background","")?>!important;
color: <?php echo $config->get("theme.button-text","")?>!important;
margin: 0.5em;
}

.button a{
color: <?php echo $config->get("theme.button-text","")?>!important;
}
