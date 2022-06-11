
<?php
require 'connection.php';
if(isset($_POST["add_to_cart"]))
    {
		session_start();

        if(isset($_SESSION["shopping_cart"]))
        {
            $cookie_data = stripslashes($_SESSION['shopping_cart']);

            $cart_data = json_decode($cookie_data, true);

        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');

        if(in_array($_POST["productid"], $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $_POST["productid"])
                {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        }
        else
        {
            $item_array = array(
                'item_id'			=>	$_POST["productid"],
                'item_name'			=>	$_POST["productname"],
                'item_price'		=>	$_POST["productprice"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $cart_data[] = $item_array;
        }


        $item_data = json_encode($cart_data);
        $_SESSION['shopping_cart'] = $item_data;
        // header("location:Cart?success=1");
		// echo 'done';
		if(isset($_SESSION['shopping_cart']))
			{

				$total = 0;
					
				$cookie_data = stripslashes($_SESSION['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values)
				{
					$total = $total+1;
				}
				echo $total;
			}
    }

if(isset($_POST["action"]))
{
	if($_POST["action"] == "delete")
	{
		$id = $_POST['id'];
		$sql = "DELETE FROM cart WHERE id='$id'";
		if ($con->query($sql)) {
			echo "Delted Successfully";
			} else{
                die("Delete failed $con->error");
        }
	}
}




if(isset($_GET["actions"]))
{
	if($_GET["actions"] == "delete")
	{
		$cookie_data = stripslashes($_SESSION['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				$_SESSION['shopping_cart'] = $item_data;

				// header("location:Cart?remove=1");
			}
		}
	}
	if($_GET["actions"] == "clear")
	{
		// $_SESSION['shopping_cart'] = '';

		// header("location:Cart?clearall=1");
	}
  if($_GET["actions"] == "dbclear")
	{
    $id = $_GET['userId'];
    
    $sql = "DELETE FROM cart WHERE userId='$id'";
    if ($con->query($sql)) {
        echo "Record deleted successfully";

        } else{
                die("Delete failed $con->error");
        }
        $con->close();

        // header('location:Cart?clearall=1');
    }

		// header("location:Cart?clearall=1");
	}


if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}
if(isset($_GET["already"]))
{
	$message = '
	<div class="alert alert-danger alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Could not delete
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}
?>
