<?php
    session_start();     
    if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header("Location: restaurants.php");
      }
                                          // starts the session
    require_once('database/connection.php');                 // database connection
    require_once('database/users.php');                      // user table queries

    $db = getDatabaseConnection();// user table queries
    if (!findUser($db,$_POST['username']) || $_POST['username']==$_SESSION['username']){
        editUser($db,$_POST['userId'],$_POST['username'],$_POST['address'],$_POST['phoneNumber']);
        $_SESSION['username'] = $_POST['username'];
        header('Location: restaurants.php');
    }
    else{
        header('Location: profile.php?invalid_name=true');
    }
?>