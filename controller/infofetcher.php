<?php 

require 'connection.php';

session_start();

$catsql = "SELECT  * FROM category WHERE status = 0 ";
$catresult = $con->query($catsql);
$catdata = [];
    if ($catresult->num_rows > 0) {
    while ($catrow = $catresult->fetch_assoc()) {
        array_push($catdata, $catrow);
    }
} 


$productsql = "SELECT  * FROM product WHERE status = 'featured' ";
$productresult = $con->query($productsql);
$productdata = [];
    if ($productresult->num_rows > 0) {
    while ($productrow = $productresult->fetch_assoc()) {
        array_push($productdata, $productrow);
    }
} 



if(isset($_GET['a'])){
    $code = $_GET['a'];
    $proctsql = "SELECT  * FROM product WHERE productcode = '$code' ";
    $proctresult = $con->query($proctsql);
 
    
}

if(isset($_GET['q'])){
    $code = $_GET['q'];
    $searchsql = "SELECT  * FROM product WHERE (productcode LIKE '%$code%') OR (name LIKE '%$code%')  OR (description LIKE '%$code%') OR (location LIKE '%$code%')   ";
    $searchresult = $con->query($searchsql);
    $searchdata = [];

    if ($searchresult->num_rows > 0) {
        while ($searchrow = $searchresult->fetch_assoc()) {
            array_push($searchdata, $searchrow);

        }
    }else{
        $error = 'nodata';
    }    
    
}


if(isset($_GET['c'])){
    $code = $_GET['c'];
    
    $catsql = "SELECT  * FROM category WHERE catcode = '$code' ";
    $catresult = $con->query($catsql);
    $catprodata = [];
        if ($catresult->num_rows > 0) {
            while ($catrow = $catresult->fetch_assoc()) {
                $categid = $catrow['id'];
                $catrowname = $catrow['name'];

            $catprosql = "SELECT  * FROM product WHERE category = '$categid' ";
            $catproresult = $con->query($catprosql);
            if ($catproresult->num_rows > 0) {
                while ($catprorow = $catproresult->fetch_assoc()) {
                    array_push($catprodata, $catprorow);
            }
        }
    }
    

        }
    
    
}
if(isset($_SESSION['lpmsemail'])){
    $carttotaldata = 0;
    $eml = $_SESSION['lpmsemail'];
    $productsql = "SELECT  * FROM cart WHERE email = '$eml'";
    $productresult = $con->query($productsql);
        if ($productresult->num_rows > 0) {
        while ($productrow = $productresult->fetch_assoc()) {
            $carttotaldata = $carttotaldata+1;

        }
    } 
    
}
else if(isset($_SESSION['shopping_cart']))
{

    $total = 0;
        
    $cookie_data = stripslashes($_SESSION['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
        $total = $total+1;
    }
    $carttotaldata = $total;
}else {
    $carttotaldata = 0;
}


 ?>