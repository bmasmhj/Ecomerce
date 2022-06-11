<?php
        if(!isset($_SESSION['lpmsemail'])){?>
            <script type="text/javascript">
            window.location.href = 'Profile';
            </script><?php
              }
            ?>
<?php
if(isset($_POST["checkout"]))
          {
            $total = 0;
           $for_query = '';
           $i=[];
           $j=0;
           $sn = 0;
           $item_name="";
            $price="";
            $equal='';
            $quantity = '';
            $sumequal= 0;
            $sumquantity = '';
           if(!empty($_POST["cart"]))
           {
            foreach($_POST["cart"] as $cart)
            {
             $i[$j] = $cart ;
                $j=$j+1;
            }
            for($k=0;$k<$j;$k++){
                $a=$i[$k];
                require "controller/connection.php";
                $cart_sql = "SELECT * FROM cart WHERE userID='$userId' AND id='$a' ";
                $cartdata = [];
                $result_cart= $con->query($cart_sql);
                if ($result_cart->num_rows > 0) {
                    while ($row_cart = $result_cart->fetch_assoc()) {
                        array_push($cartdata, $row_cart);
                    }
                }
                foreach($cartdata as $key => $cartinfo){
                        // echo $cartinfo['item_name']."<br>";
                        $item_name= $cartinfo['item_name'].'<br>'.$item_name;
                        $equal= $cartinfo['item_price']*$cartinfo['item_quantity'].'<br>'.$equal;
                        $quantity = $cartinfo['item_quantity'].'<br>'.$quantity;


                        if($sn == 0 ){
                            $sumequal= $cartinfo['item_price']*$cartinfo['item_quantity'];
                            $sumquantity = $cartinfo['item_quantity'];
                            $sn = 1;

                        }else{
                            $sumequal= $sumequal.'+'.$cartinfo['item_price']*$cartinfo['item_quantity'];
                            $sumquantity = $sumquantity.'+'.$cartinfo['item_quantity'];
                        }
                        $total= $cartinfo['item_price']*$cartinfo['item_quantity']+$total;

                    }
            }
            }
        }
    ?>