<?php
  // Database connection
  require_once('database/restaurants.php');

  $db = getDatabaseConnection();
  add_dish($db,$_POST["name"],$_POST["price"],$_POST["menu_id"]);
  add_image($db,$_POST["restaurant_id"],$_POST["name"]);
  header("Location: restaurant.php?id=$restaurant_id");
?>