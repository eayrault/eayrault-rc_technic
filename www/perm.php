<?php
function permCheck1($role){
    if ($role >= 1 && isset($_SESSION["user"])) {
        return;
    } else {
        notPerm();
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}

function permCheck2($role){
    if ($role >= 2 && isset($_SESSION["user"]) ) {
        return;
    } else {
        notPerm();
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}

function permCheck3($role){
    if ($role >= 3 && isset($_SESSION["user"])) {
        return;
    } else {
        notPerm();
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}

function notPerm(){
    echo "<div class=\"alert alert-danger\" role=\"alert\">Vous n'avez pas la permission</div>";
}
