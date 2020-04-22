<?php session_start() ?>
<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>

<?php
    if (empty($_SESSION['login'])) {
        header('location: /login.php');
    }
?>

<section class="cookies container-fluid">
    <div class="row">

        <?php if(!empty($_SESSION['cart'])) { ?>
            Votre pannier contient la liste des produits suivants :
            <ul>
                <?php $cart=$_SESSION['cart'];
                foreach($cart as $id => $quantity) {
                    $cookieName=$catalog[$id]['name'];?>
                    <li><?= $cookieName.' ('.$quantity.'pcs)' ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            Votre panier est vide.
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
