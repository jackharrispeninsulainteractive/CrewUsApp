<?php

return [
    'site' => [
        'title' => 'Crew US!', //HTML Title for your page!
        'favicon' => 'https://www.peninsulahotsprings.com/favicon.ico', // Favicon Link https://example.com/favicon
        'maxUploadSize' => (10**6)*5, // Maximum upload size in bytes (10**6)*5 = 5 MB;
        'showSignUpPage' => true
    ],
    'company' => [
        'name' => 'Crew Us', // Company Name
        'url' => 'https://peninsulainteractive.com', // Company URL Link (Main Site)
        'logo' => 'https://au.beakon.io/phs/custom/themes/default/images/company_logo_login.png?1620629614', //Compnay Logo https://example.com/logo.png
        'logo-rectangle' => 'https://www.peninsulahotsprings.com/wp-content/themes/FoundationPress/assets/images/header-logo.png', //Compnay Logo https://example.com/logo.png RECTANGLE ONLY!
        'copyright' => 'Copyright 2021 CrewUs!' // Company Copyright Text (Copyright Example  2001-2021)
    ],
    'db' => [
        'type' => 'mysql', //Database type MYSQL / MARIADB
        'host' => 'localhost', // IP !!!! REQUIRED !!!!
        'name' => 'phs-l&e', // Database name !!!! REQUIRED !!!!
        'user' => 'root', // Database User !!!! REQUIRED !!!!
        'pass' => '' // Database User Password
    ],
    'mail' => [
        'host' => 'mail.example.com', //NOT IMPLEMENTED
        'user' => 'admin@example.com', //NOT IMPLEMENTED
        'pass' => 'abc123', //NOT IMPLEMENTED
        'url' => 'https://example.com' //NOT IMPLEMENTED
    ],
    'theme' => [

        // Login Page
        'login-logo' => 'true', // True or false selector for displaying the company logo on login screen, true will display, false will not
        'login-logo-maxsize' => '128px', // Max Size of the login logo, select the size unit too (px, em, %)

        // NavBar
        'navbar-logo' => true, // True or false value for if the navbar logo should display
        'navbar-logo-maxheight' => '48px', // Max Size of the navbar logo
        'navbar-background-color' => '#153771', // Sets the navbar font color
        'navbar-text-color' => 'white', // Sets the navbar font color

        // Buttons
        'button-background' => '#153771', // Button background color
        'button-text' => 'white', // Button text Color

        // Icons
        'icon-accent-color' => '#153771' // Icon accent color
    ],
]
?>