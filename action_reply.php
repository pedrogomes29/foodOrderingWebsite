<?php
    session_start(); 
    if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header("Location: restaurants.php");
      }
                                             // starts the session
    require_once('database/connection.php');                 // database connection
    require_once('database/restaurants.php');                      // user table queries
   
      

    $db = getDatabaseConnection();
    add_reply($db,$_POST["owner_id"],$_POST["idReview"],$_POST["replyText"]);
    header("Location: restaurant.php?id=".$_POST["restaurant_id"]);
?>