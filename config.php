<?php

// Alsjeblieft hier vanaf blijven anders gaat de hele website naar de tering. dankje.

$config =  array(
    // Server informatie
    'serverinfo' => [
        // Volledige address van de site
        'serveradress' => "http://localhost/gitSites/Klantenpaneel/",
        // Subpath van de site (alles wat na de eerste slah komt)
        'subpath' => 'gitSites/Klantenpaneel/',
        // Huidige pagina, products
        'currentpage' => pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME),
        // Huidige pagina + subdir, manage/products
        'currentpagelocation' => substr(str_replace('/gitSites/Klantenpaneel','',pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME)).'/'.pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME),1),
    ],
    // Database instellingen
    'db' => [
        // Database host
        'adress' => 'localhost',
        // Database naam
        'database' => 'clientpanel',
        // Database gebruikersnaam
        'username' => 'root',
        // Database wachtwoord
        'password' => '',
    ],

    // Rechten voor groepen
    'permissions' => [
        // Administrators
        "admins"=> [
            "manageproducts",
        ],
        // Gebruikers
        "users"=> [
            "dashboard",
            "invoices",
            "buyproduct",
            "tickets",
        ],
        // Bezoekers
        "everyone"=> [
            "register",
            "login",
        ]
    ]
);

$config['permissions']['users'] = array_merge($config['permissions']['users'], $config['permissions']['everyone']);
$config['permissions']['admins'] = array_merge($config['permissions']['admins'], $config['permissions']['users']);

// Persoonlijke browser (data)
session_start();
$conn = new mysqli($config['db']['adress'], $config['db']['username'], $config['db']['password'], $config['db']['database']);
if ($conn->connect_error) {
    die("<h1>Database connection error: </h1>");// . $conn->connect_error);
}

// Kijken of iemand rechten heeft
function doesUserHavePermission($permission, $dieIfNot=false, $dieIfNotLoggedIn=false){
    global $config;
    if($dieIfNotLoggedIn){
        if(isUserLoggedIn() === false){
            require_once "includes/error.php";
            startErrorCode(401);
        }
    }
    $group = "everyone";
    if(isset($_SESSION['usergroup'])){
        $group = strtolower($_SESSION['usergroup']);
    }
    if(in_array(strtolower($permission), $config['permissions'][$group])){
        return true;
    }
    if($dieIfNot){
        require_once "includes/error.php";
        startErrorCode(403);
    }
    return false;
}

// Kijken of de gebruiker ingelogd is
function isUserLoggedIn(){
    if(isset($_SESSION['token']) == false){
        return false;
    }
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM users WHERE token = ?");
    $stmt->bind_param("s", $_SESSION['token']);
    $stmt->execute();
    $result = $stmt->get_result();
    $userexists = false;
    $passwordcorrect = false;
    while ($data = $result->fetch_assoc()){
        if($data['id'] == $_SESSION['id']){
            return true;
        }
    }
    return false;
}

// Verwijder html elementen uit de text
function htmlToPlainText($str){
    $str = str_replace('&nbsp;', ' ', $str);
    $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
    $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
    $str = html_entity_decode($str);
    $str = htmlspecialchars_decode($str);
    $str = strip_tags($str);
    return $str;
}

// Krijg IP-adres van bezoeker
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        // IP van internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        // IP van proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Servernode 2019 (c) Alle rechten voorbehouden.
// Systeem gemaakt door P.D.T van der Wilk (mcpoesen) en onno204
