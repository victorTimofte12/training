<?php
require_once('common.php');

if(isset($_SESSION['test'])) {

    echo '<meta http-equiv="refresh" content="0; url=products.php" />';
}

    if(isset($_POST['login'])) {


        $usern = $_POST['user'];

        $passw = $_POST['password'];


        if(!$usern === ADMIN && $passw === PASSWORD){

            $msg = "Numele Adminului sau Parola sunt gresite !";

        } else {

            $_SESSION['test'] = true;
            $_SESSION['test'] = $usern;

            $msg = "Logat cu succes !";

            header("Refresh:3; url=products.php");

        }

    }

?>




<div id="login">
    <?php     if(isset($_POST['login'])) { echo $msg; } ?>
    <form method="post" action="" name="login">
        <label>Username</label>
        <input type="text" name="user" placeholder="Username" autocomplete="off" />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" autocomplete="off"/>

        <input type="submit" class="button" name="login" value="Login">
    </form>
</div>

<?php require('assets/footer.php');?>