<?php
    session_start();

    require_once("templates/common.php");
    require_once("database/connection.php");
    require_once("database/users.php");
    if(!isset($_SESSION["username"]))
        header("Location: restaurants.php");
    $db=getDatabaseConnection();
    $user_info = getUserInfo($db);
    output_header("profile");?>
    <form action="action_edit_profile.php" method="post">
        <h2>Edit profile</h2>
        <?php if($_GET["invalid_name"]=="true"){?>
            <h3 id="warning">Username already exists, please try a different one</h3>
        <?php } ?>
        <input type="text" name="userId" hidden value="<?=$user_info["idUser"]?>">
        <label class="field">Username:
            <input type="text" name="username" value="<?=htmlentities($user_info["username"])?>">
        </label>
        <br>
        <label class="field">Address:
            <input type="text" name="address" value="<?=htmlentities($user_info["address"])?>">
        </label>
        <br>
        <label class="field">Phone number:
            <input type="tel" name="phoneNumber" value="<?=$user_info["phoneNumber"]?>">
        </label>
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <br>
        <button type="submit">Save</button>
    </form>
<?php
    output_footer();
?>