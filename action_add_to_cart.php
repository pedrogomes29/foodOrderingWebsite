<?php
    session_start();
    require_once("database/connection.php");
    require_once("database/restaurants.php");
    require_once("database/users.php");
    if(!isset($_SESSION["username"]))
        header("Location: login.php");
    else{
        $db = getDatabaseConnection();
        $user_info = getUserInfo($db);
        if(!isset($_SESSION["dishes"]))
            $_SESSION["dishes"] = array();
        array_push($_SESSION["dishes"], $_POST["dish_id"]);
        header("Location: $_SERVER[HTTP_REFERER]");
    }
?> 