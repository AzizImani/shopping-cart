<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 31/01/2016
 * Time: 00:23
 */
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Ecommerce Website</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <table class="navbar-brand">
                    <tr>
                        <td rowspan="2"><a class="glyphicon glyphicon-shopping-cart" href="cart.php"></a></td>
                        <td>Items</td>
                        <td>Total</td>
                    </tr>
                    <tr>
                        <td id="count"><?= $cart->count(); ?></td>
                        <td id="total"><?= number_format($cart->getTotal(),2,',',' '); ?> €</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container -->
</nav>
