<?php
class Cart{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
    }

    public function addProduct($id){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        }else{
            $_SESSION['cart'][$id] = 1;
        }
    }

    public function count(){
        return array_sum($_SESSION['cart']);
    }

    public function getTotal(){
        $total = 0;
        $ids = array_keys($_SESSION['cart']);
        if(!empty($ids)){
            $sql = "SELECT id,price FROM products WHERE id IN (".implode(',',$ids).")";
            $products = $this->db->query($sql);
        }else{
            $products = array();
        }

        foreach($products as $product){
            $total += $product->price * $this->get($product->id);
        }
        return $total;
    }
    public function get($id)
    {
        return $_SESSION['cart'][$id];
    }

    public function delete($id)
    {
        unset($_SESSION['cart'][$id]);
    }
}