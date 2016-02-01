<?php
require  "includes.php";
if(isset($_GET['del'])){
    $cart->delete($_GET['del']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ecommerce Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php require "header.php" ?>
<!-- Page Content -->
<div class="container">
    <h3>Shopping cart</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ids = array_keys($_SESSION['cart']);
            if(!empty($ids)){
                $sql = "SELECT * FROM products WHERE id IN (".implode(',',$ids).")";
                $products = $db->query($sql);
            }else{
                $products = array();
            }

            foreach($products as $product):
            ?>
            <tr>
                <td><?= $product->name; ?></td>
                <td><?= number_format($product->price,2,',',' '); ?> €</td>
                <td><?= $cart->get($product->id);?></td>
                <td><?= number_format($product->price*$cart->get($product->id),2,',',' '); ?> €</td>
                <td><a class="glyphicon glyphicon-trash" href="cart.php?del=<?=$product->id?>"></a></td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <h4>Grand Total : <?php
                $tva = 1;
                echo number_format($cart->getTotal()*$tva,2,',',' '); ?> €</h4>
        </div>
    </div>

    <hr>
<?php require "footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>

