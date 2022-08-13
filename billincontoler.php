<?php 



$j=0;
foreach($_POST["carts"] as $cart)
{
    $i[$j] = $cart ;
    $j=$j+1;
}

$p = $_POST['provience'];
$d = $_POST['district'];


$s= $_POST['street'];

$psql = "SELECT  * FROM province WHERE pid = '$p' ";
$presult = $con->query($psql);
    if ($presult->num_rows > 0) {
    while ($prow = $presult->fetch_assoc()) {
        $provinece = $prow['pname'];
    }
} 
$dsql = "SELECT  * FROM districts WHERE did = '$d' ";
$dresult = $con->query($dsql);
    if ($dresult->num_rows > 0) {
    while ($drow = $dresult->fetch_assoc()) {
        $district = $drow['dname'];

    }
} 


$nowl = $provinece.', '.$district.' - '.$s;




$e = $_POST['email'];
$u = $_POST['uname'];
$n = $_POST['number'];
$date = date("l jS F Y");
$total = 0;
$sn = 0;
$item_name="";
$price="";
$equal='';
$quantity = '';
$sumequal= 0;
$sumquantity = '';
$filename = $websitename.'.png';
$inv = md5($date.$p.$d.$s.$e.$u.$n);
$in2 = substr($inv,0,10);
$invoice = substr(base64_encode($in2) , 0 , 10);
$r=0;
for($k=0;$k<$j;$k++){
    $a=$i[$k];
    require "main/conn.php";

    $cart_sql = "SELECT * FROM cart WHERE id = $a ";
    $email = $_SESSION['lpmsemail'];
    $user_sql = "SELECT * FROM usertable WHERE email = '$email' ";
    $result_user= $con->query($user_sql);
    if ($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $userid = $row_user['id'];
            echo $userid;
        }
    }

    $result_cart= $con->query($cart_sql);
    if ($result_cart->num_rows > 0) {
        while ($row_cart = $result_cart->fetch_assoc()) {
            $productid = $row_cart['item_id'];
            echo $productid;
            $productname = $row_cart['item_name'];
            $price = $row_cart['item_price'];
            $total = $row_cart['equal'];
            $quantitys = $row_cart['item_quantity'];

            // echo $row_cart['item_name']."<br>";
            $item_name= $row_cart['item_name'].'<br>'.$item_name;
            $equal= $row_cart['item_price']*$row_cart['item_quantity'].'<br>'.$equal;
            $quantity = $row_cart['item_quantity'].'<br>'.$quantity;


            if($sn == 0 ){
                $sumequal= $row_cart['item_price']*$row_cart['item_quantity'];
                $sumquantity = $row_cart['item_quantity'];
                $sn = 1;

            }else{
                $sumequal= $sumequal.'+'.$row_cart['item_price']*$row_cart['item_quantity'];
                $sumquantity = $sumquantity.'+'.$row_cart['item_quantity'];
            }
            $total = $row_cart['item_price']*$row_cart['item_quantity'];

            $r += $total;

            $tbl_order_sql = "SELECT * FROM tbl_order WHERE invoice = '$invoice'  AND productname = '$productname' AND quantity = '$quantitys' ";
            $result_tbl_order= $con->query($tbl_order_sql);
            if ($result_tbl_order->num_rows > 0) {

            }else{
                $sql = "INSERT INTO `tbl_order`(`invoice`,`productid`,`userrid`, `productname`, `email`, `quantity`, `price`, `total`,`location`, `status`) VALUES 
                                                ('$invoice',$productid,$userid,'$productname','$email','$quantitys','$price','$total', '$nowl' ,'Ordered')";
                $save =  mysqli_query($con, $sql);
                if($save){
                    $rsql = "DELETE FROM cart WHERE id = $a";
                    $delete =  mysqli_query($con, $rsql);
                    if($delete){

                    }

                }else{
                    // echo 'fail';
                    die("insert failed $con->error");
                }
            }
            
        }
    }
}

?>