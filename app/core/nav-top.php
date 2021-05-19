<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */

//start the session
session_start();
$user = new User;
$config = new Config;
$user_data = $user->checkSession();
$config->load($_SERVER['DOCUMENT_ROOT'].'/config.php');
?>
<nav class="navbar navbar-expand-lg navbar-custom" style=" background:<?php echo $config->get("theme.navbar-background-color","")?>; margin-bottom: 2em;">
    <div class="container-fluid">
        <?php if($config->get('theme.navbar-logo')){
            $navlogo = $config->get('company.logo-rectangle',"");
            echo "<a class='navbar-brand' href='#'><img src='$navlogo' alt='Company Logo' class='navLogo''></a>";
        }else{
            echo "<h4>EcoBooks</h4>";
        }?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-caret-square-down"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php"><i class="fas fa-ship"></i> My Crews</a>
                </li>
            </ul>

                <ul class="navbar-nav ms-auto flex-nowrap">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link m-2 menu-item dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"><strong>Welcome <?php echo $user_data['user_name']?></strong><img src="<?php echo $user_data['user_photo']?>" alt="test" class="navbar-photo"></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if($user_data['user_level'] == 1){
                                echo'<li><a class="dropdown-item" href="../users&groups.php"><i class="fas fa-users"></i> Users & Groups</a></li>';
                            }?>
                            <?php if($user_data['user_level'] == 1){
                                echo'<li><a class="dropdown-item" href="#"><i class="fas fa-toolbox"></i> Application Settings</a></li>';
                            }?>
                            <li><a class="dropdown-item" href="../profile.php"><i class="fas fa-user-cog"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li
                </ul>

        </div>
    </div>
</nav>