<?php session_start() ?>
<?php require 'inc/data/products.php'; ?>

<?php
    if ($_SERVER['REQUEST_METHOD']=='GET') {

        if (!empty($_GET['add_to_cart'])) {

            if (empty($_SESSION['login'])) {
                header('location: /login.php');
            }

            if(is_numeric($_GET['add_to_cart'])) {
                $id=intval($_GET['add_to_cart']);
                if (empty($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]=1;
                } else {
                    $_SESSION['cart'][$id]++;
                }
            }
        }

        if (!empty($_GET['action'])) {
            if(($_GET['action']=='deconnexion')) {
                session_destroy();
                session_unset();
                unset($_SESSION['login']);
            }
        }

    }
?>

<?php require 'inc/head.php'; ?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
