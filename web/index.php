<?php
require_once('common.php');

$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    if (isset($_GET['id'])):
        array_push($_SESSION['cart'], $_GET['id']);
    endif;

foreach($_SESSION['cart'] as $key => $value) {

    $id = $value;

    $stmt = database()->prepare("SELECT `id`,`title`,`description`,`price` FROM `products` WHERE NOT `id` = ? ");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $stmt->fetch();
}
?>


<html>
    <head>
        <title><?php echo strtr("title", $trans); ?></title>
        <link href="style.css" rel="stylesheet">
    </head>

<body>


<img  style="width: 250px;" src="<?= $row['id'] ?>.jpg">
<ul>
    <li style="padding: 3px"><?= $row['title'] ?></li>
    <li style="padding: 3px"><?= $row['description'] ?></li>
    <li style="padding: 3px"><?= $row['price'] ?></li>
</ul>


    <a href="index.php?id=<?= $row['id'] ?>" name="id">Add</a>


<?php $stmt->close(); ?>
<a href="cart.php">Go to cart</a>
</body>
</html>