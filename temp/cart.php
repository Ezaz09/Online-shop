<?php
require_once  "parts/header.php";

if(isset($_SESSION['order'])) { ?>
    <h2 class="cart-title"> Ваш заказ под номером <?=$_SESSION['order']?> принят!</h2>
    <a href = "index.php" class="back">На главную</a>
<?}
else if (count($_SESSION['cart'])==0){?>
    <h2 class="cart-title"> Ваша корзина пуста</h2>
    <a href = "index.php" class="back">На главную</a>
<? } else {

foreach ($_SESSION['cart'] as $key=>$product){
?>
        <div class="cart">
            <a href="product.php?product=<?=$product['title']?>">
            <img src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
            </a>
            <div class="cart-descr">
                <?=$product['rus_name']?> в количестве <?=$product['quantity']?>  шт на сумму <?=$product['quantity'] * $product['price']?>  рублей
            </div>
            <form action="actions/delete.php" method="post">
                <input type="hidden" name="delete" value=<?=$key?>>
                <input type="submit" value="Удалить">
            </form>
        </div>



<? }  ?>

<form   method = "post" class="order product-form">
    <input type="text" name = "username" required placeholder="Ваше имя">
    <input type="text" name = "phone" required placeholder="Ваш телефон">
    <input type="text" name = "email" required placeholder="Ваш email">
    <input type="submit" name = "order" value="Отправить заказ">
</form>

<? } 
 require_once "footer.php";

