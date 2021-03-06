<?php
    session_start();
    require_once("templates/common.php");
    require_once("database/users.php");
    require_once("database/connection.php");
    require_once("database/restaurants.php");
    $db=getDatabaseConnection();
    $restaurant_info =  getRestaurant($db,$_GET['restaurant_id']);


    if ((getUserInfo($db)['idUser'] != $restaurant_info['owner'])||!isset($_SESSION['username']))
        header("Location: restaurant.php?id=".$_GET["restaurant_id"]);

    output_header("edit_dish");
    $categories = getDishCategories($db,$_GET["restaurant_id"]);
    $dish_info = getDishInfo($db,$_GET['dish_id']);  
    ?>     
    <body background = "imgs/restaurants/<?=$restaurant_info['idRestaurant']?>/header.jpg">  
    <form id="main" action="action_edit_dish.php" method="post" enctype=multipart/form-data>
        <?php if($_GET["invalid_name"]=="true") { ?>
            <h3 id="warning">Dish name already in use!</h3>
            <br>
        <?php }?>
        <label> Dish name:
            <input id="one" type="text" name="name" value="<?=$dish_info["name"]?>">
        </label>
        <?php
        ?>
        <label> Dish category: 
            <select name="category">
            <?php
                foreach($categories as $category){?>
                    <option value="<?=$category["idDishCategory"]?>" <?php if($category["idDishCategory"]==$dish_info["idDishCategory"]) echo("selected");?> ><?=$category["name"]?></option>
                <?php } ?>
            </select>
        </label>
        <label> Dish price:
            <input id="two" type="number" name="price" value=<?=$dish_info["price"]?> step="0.01">
        </label>
        <input type="hidden" value=<?=$_GET['dish_id']?> name="dish_id">
        <input type="hidden" value=<?=$_GET['restaurant_id']?> name="restaurant_id">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <label class= "file_upload"> Dish image:
            <input type="file" name="new_image">
        </label>
        <button name="button" type="submit">Edit dish</button>
    </form>
    <form id="second" action="action_remove_dish.php" method="post">
        <input type="hidden" value=<?=$_GET['dish_id']?> name="dish_id">
        <input type="hidden" value=<?=$_GET['restaurant_id']?> name="restaurant_id">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <button name="button" type="submit">Remove dish</button>
    </form>
    </body>
<?php
    output_footer();
?>  