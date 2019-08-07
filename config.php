<?php


$config =  array(
    'serverinfo' => [
        // Volledige address van de site
        'serveradress' => "http://localhost/meos/",
        // Subpath van de site (alles wat na de eerste slah komt)
        'subpath' => 'meos/',
        // Huidige pagina, products
        'currentpage' => pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME),
        // Huidige pagina + subdir, manage/products
        'currentpagelocation' => substr(str_replace('/cclientpanel','',pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME)).'/'.pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME),1),
    ],
    // Database settings
    'db' => [
        'adress' => 'localhost',
        'database' => 'clientpanel',
        'username' => 'root',
        'password' => '',
    ],

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

// Merge user perms
$config['permissions']['users'] = array_merge($config['permissions']['users'], $config['permissions']['everyone']);
$config['permissions']['admins'] = array_merge($config['permissions']['admins'], $config['permissions']['users']);

// inclused
require_once "includes/frontend-functions/verification.php";

//mysql
session_start();
$conn = new mysqli($config['db']['adress'], $config['db']['username'], $config['db']['password'], $config['db']['database']);
if ($conn->connect_error) {
    die("<h1>Database connection error: </h1>");// . $conn->connect_error);
}
