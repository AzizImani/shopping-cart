<?php
require "classes/Db.class.php";
require "classes/Cart.class.php";
$db = new DB();
$cart = new Cart($db);