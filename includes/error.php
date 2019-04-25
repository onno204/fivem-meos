<?php
function startErrorCode($Errorcode){
    global $config;
    switch($Errorcode)
    {
        # "400 - Bad Request"
        case 400:
        $error_code = "400 - Bad Request";
        $error_explain = "Something went wrong!";
        break;

        # "401 - Unauthorized"
        case 401:
        $error_code = "401 - Unauthorized";
        $error_explain = "
            <p>You aren't logged in!</p>
            <br>
            <h1><a href=\"".$config['serverinfo']['serveradress']."/Login\">Login or Register</a></h1>
            ";
        break;

        # "403 - Forbidden"
        case 403:
        $error_code = "403 - Forbidden";
        $error_explain = "
            <p>Your account is not authorized to see this page!</p>
            <br>
            <h1><a href=\"".$config['serverinfo']['serveradress']."/Login\">Login or Register</a></h1>
            ";
        break;

        # "404 - Not Found"
        case 404:
        $error_code = "404 - Not Found";
        $error_explain = "The file you where looking for was not found on our servers!";
        break;

        # "500 - Not Found"
        case 500:
        $error_code = "500 - Server Error";
        $error_explain = "Something went wrong!";
        break;
    }
    startError($Errorcode, $error_code, $error_explain);
}

function startError($ErrorCode, $ErrorTitle, $ErrorExplain){
    ?>
    <style>
        Upper{
            width: 100vw;
            height: 15vh;
            background-color: rgba(150,150,150,1);
            position: absolute;
            top: 0px;
            left:0px;
            font-size: 5vh;
            align-items: center;
            justify-content: center;
            display: flex;
        }
        Main{
            width: 100vw;
            height: 70vh;
            background-color: rgba(199,199,199,1);
            position: absolute;
            top: 15vh;
            left:0px;
            font-size: 5vh;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        footer{
            width: 100vw;
            height: 15vh;
            background-color: rgba(100,100,100,1);
            position: absolute;
            top: 85vh;
            left:0px;
            font-size: 5vh;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>

    <title>Error: <?php echo $ErrorCode; ?></title>
    <Upper>
        <?php echo $ErrorTitle; ?>
    </Upper>
    <Main>
        <br>
        <?php echo $ErrorExplain; ?>
    </Main>
    <footer>
        <a href="javascript:window.history.back();">Click here to go back to the site!</a>
    </footer>


    <?php
    http_response_code($ErrorCode);
    
    echo $ErrorCode;
    echo "<br>";
    echo $ErrorTitle;
    echo "<br>";
    echo $ErrorExplain;
    die();
}