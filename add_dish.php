<?php
    session_start();
    require_once("templates/common.php");
    require_once("database/users.php");
    require_once("database/restaurants.php");
    require_once("database/connection.php");
    $db=getDatabaseConnection();
    $restaurant_info =  getRestaurant($db,$_GET['restaurant_id']);
    if ((getUserInfo($db)['idUser'] != $restaurant_info['owner'])||!isset($_SESSION['username']))
        header("Location: restaurant.php?id=".$_GET["restaurant_id"]);


    $categories = getDishCategories($db,$_GET["restaurant_id"]);
    output_header("add_dish");
?>   
    <body background = "imgs/restaurants/<?=$restaurant_info['idRestaurant']?>/header.jpg">  
    <form id="main" action="action_upload_dish.php" method="post" enctype=multipart/form-data>
        <?php if($_GET["invalid_name"]=="true") { ?>
            <h3 id="warning">Dish name already in use!</h3>
            <br>
        <?php }?>
        <label> Dish name:
            <input id="one" type="text" name="name">
        </label>
        <label> Dish category: 
            <select name="dishCategory">
            <?php
                foreach($categories as $category){?>
                    <option value="<?=$category["idDishCategory"]?>"><?=$category["name"]?></option>
            <?php } ?>
            </select>
        </label>
        <label> Dish price:
            <input id="two" type="number" name="price" step="0.01">
        </label>
        <input type="hidden" value=<?=$_GET["restaurant_id"]?> name="restaurant_id">
        <label> Dish image:
            <input type="file" name="image">
        </label>
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <button name="button" type="submit">Add dish</button>
    </form>
    </body>
<?php
    output_footer();
?>  