<?php require 'main/cartcontrller.php'; ?>

<style>
	/* .showlogin{
		display:block!important;
		opacity:1!important ;
		top:250px!important;
	} */
</style>
<div class="container mt-5 mb-5">
<table class="table table-bordered">
	<tr>
		<th>Sn</th>
		<th width="40%">Item Name</th>
		<th >Quantity</th>
		<th >Price</th>
		<th> Total </th>
		<th  >Action</th>
	</tr>
	<form action="checkout.php" id='cart' method="post" novalidate>

        <?php

		if(isset($_SESSION['lpmsemail']))
		{
			$email = $_SESSION['lpmsemail'];
			if(isset($_SESSION["shopping_cart"])!='')
			{
				
				$total = 0;
				$cookie_data = stripslashes($_SESSION['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);

				foreach($cart_data as $keys => $values)
				{
					$item_name = $values["item_name"];
					$item_quantity = $values["item_quantity"];
					$item_price = $values["item_price"];
					$item_id = $values["item_id"];
					$equal = $tot=number_format($values["item_quantity"] * $values["item_price"], 2);
					// $total = $equal+$total;
					$duplicate_check = "SELECT * FROM cart WHERE email='$email' AND item_id='$item_id'";
					$res = mysqli_query($con,$duplicate_check);
					if(mysqli_num_rows($res)>0){
						$sqli = "UPDATE cart SET item_quantity = item_quantity  + '$item_quantity', equal = item_price*(item_quantity)   WHERE email = '$email' AND item_id='$item_id'";

						if ($con->query($sqli))
					   {
						   echo "Refer Code used Succesfully.";
						}
					// $alert="already";
					}
					else{
						$save_sql="INSERT INTO cart ( `userID`, `item_name`, `item_quantity`, `email`, `item_price`, `equal`, `item_id`) VALUES
						('$userId','$item_name','$item_quantity','$email','$item_price','$equal','$item_id' )";
						if($con->query($save_sql)){

							echo"Your cart has been saved for later";
					}
					else{
						die("failed $con->error");
					}
					}
				}
			?>
			<script type="text/javascript">
				window.location.href = 'clear.php';
			</script>
			<?php
			}

			$items_sql = "SELECT * FROM cart WHERE email='$email'";
			$result = $con->query($items_sql);
			$cart_data = [];
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						array_push($cart_data, $row);
					}
				}
				$total=0;
			foreach($cart_data as $keys => $values)
				{
				$total = $total+($values['item_price']*$values['item_quantity']); ?>
					<tr id="cart_item_<?php echo $values["id"]; ?>">
					<td> <input  required type="checkbox" name='cart[]' id='itemcart' value="<?php echo $values['id'];  ?>" ></td>

						<td><?php echo $values["item_name"]; ?></td>
					<?php  $item_id= $values['id'];?>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rs. <?php echo $values["item_price"]; ?></td>
						<td>Rs. <?php  $tot=number_format($values["item_quantity"] * $values["item_price"], 2);  echo $tot ?></td>
						<td>

							<a href="javascript:deletecartitem(<?php echo $values["id"]; ?>)" class=" btn btn-danger"><span class="text-white">Remove</span></a>


						</td>
					</tr>
        	<?php } ?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">Rs. <?php echo number_format($total,2) ?></td>
					<td colspan="2">
						
						<input type="submit" value="Checkout" name="checkout" class="btn btn-success" >
					</form>
					</td>
				</tr>
		<?php }
		elseif(isset($_SESSION['shopping_cart']))
			{

				$total = 0;
        			
				$cookie_data = stripslashes($_SESSION['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values)
				{
          			
					?>
					<tr>
						<td> <input type="checkbox" name="" value=""> </td>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rs. <?php echo $values["item_price"]; ?></td>
						<td>Rs. <?php  $tot=number_format($values["item_quantity"] * $values["item_price"], 2);  echo $tot ?></td>
						<td>
						
							<a href="Cart?actions=delete&id=<?php echo $values["item_id"]; ?>" class=" btn btn-danger"><span class="text-white">Remove</span></a>
							</form>

						</td>
					</tr>
					<?php $total = $total + ($values["item_quantity"] * $values["item_price"]);
				} ?>
					<tr>
					<td colspan="4" align="right">Total</td>
					<td align="right">Rs. <?php echo number_format($total, 2); ?></td>
					<td><a href="javascript:login()" class="btn btn-success" >Checkout</button></tr>
				<?php
			}
				else
				{
					echo '
					<tr>
						<td colspan="5" align="center">No Item in Cart</td>
					</tr>
					';
				}
				?>
    </table>

</div>

<script type="text/javascript">
 


function login(){
	
	$('#exampleModal').addClass('show');
	$('#exampleModal').addClass('d-block');

}
function cancellogin(){
	$('#exampleModal').removeClass('show');
	$('#exampleModal').removeClass('d-block');

}

</script>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You must login for checkout</h5>
		<a type="button" href="javascript:cancellogin()" >❌ </a>

      </div>
      <div class="modal-body text-center">
        <a href="Profile" class="mx-4 btn btn-primary">Login</a>
        <a href="Profile/SignupUser" class="mx-4 btn btn-primary">Sign up</a>

      </div>
      
    </div>
  </div>
</div>