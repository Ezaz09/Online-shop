<?php

require_once  "parts/header.php";

if(isset($_GET['cat'])){
    $currentCat = $_GET['cat'];
    $products = $connect->query("select * from products where cat_id ='$currentCat'")
        ->fetchALL(PDO::FETCH_ASSOC);
    if(!$products) {
        die("Такой категории не найдено!");
    }
} else {
    $products = $connect->query("select * from products")
        ->fetchALL(PDO::FETCH_ASSOC);
}
?>

    <div class="product-vrapper main">
       
    </div>
<?php 
 require_once "footer.php";



