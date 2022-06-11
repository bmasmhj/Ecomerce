<?php 

session_start();
if(isset($_SESSION['shopping_cart'])!=''){

$cookie_data = stripslashes($_SESSION['shopping_cart']);
$cart_data = json_decode($cookie_data, true);
foreach($cart_data as $keys => $values)
{
  
        unset($cart_data[$keys]);
        $item_data = json_encode($cart_data);
        $_SESSION['shopping_cart'] = $item_data;

        header('location: cart.php');
}
unset($_SESSION['shopping_cart']);
}else{
    header('location: cart.php');
    
}

?>