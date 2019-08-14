<?php

$config =  array(
    'serverinfo' => [
        // Volledige address van de site, http://localhost/meos/
        'serveradress' => "http://localhost/meos/",
        // Subpath van de site (alles wat na de eerste slah komt), meos/
        'subpath' => 'meos/',
    ],
    // Database settings
    'db' => [
        'adress' => 'localhost',
        'database' => 'clientpanel',
        'username' => 'root',
        'password' => '',
    ],
    // Permissie settings
    'permissions' => [
        "admins"=> [
            "manageproducts",
        ],
        "users"=> [
            "dashboard",
            "invoices",
            "buyproduct",
            "tickets",
        ],
        "everyone"=> [
            "register",
            "login",
        ]
    ]
);
// / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
//               Recommended to change nothing below this line
//                Aanbevolen om niks hieronder aan te passen
// / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /

// Development:
// error_reporting(0);

// Huidige pagina + subdir
$config["serverinfo"]['currentpagelocation'] = str_replace(pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME),$config["serverinfo"]['subpath'].'frontend/','').'/'.pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME);
$config["serverinfo"]['currentpage'] = pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME);
$config["serverinfo"]['currentpageFrontendPath'] = str_replace("/".$config["serverinfo"]['subpath']."frontend", '', pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME)).'/'.$config["serverinfo"]['currentpage'];

// Merge user perms
$config['permissions']['users'] = array_merge($config['permissions']['users'], $config['permissions']['everyone']);
$config['permissions']['admins'] = array_merge($config['permissions']['admins'], $config['permissions']['users']);

// inclused
require_once "includes/frontend-functions/verification.php";
require_once "includes/frontend-functions/random.php";

//mysql
session_start();
$conn = new mysqli($config['db']['adress'], $config['db']['username'], $config['db']['password'], $config['db']['database']);
if ($conn->connect_error) {
    die("<h1>Database connection error: </h1>");// . $conn->connect_error);
}
