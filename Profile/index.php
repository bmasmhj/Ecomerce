<?php require_once "controllerUserData.php"; 
 require 'checker.php';
  require 'header.php'; require 'sidebar.php' ?>
               

<div class="container text-black">
    <div class="row d-flex">
        <h4 style="flex-grow:1">Previous Orders</h4>  
        <a href="../Cart" class="nav-link">Cart <span class="icon-shopping_cart"></span>[<span id="cartdatatotal"><?php echo $carttotaldata ?></span>]</a>
        </div>
        <div class="col-md-12">
            <div class="table-resposive table mt-2" style='    max-height: 340px!important;
            overflow: auto;
            overflow-x: hidden;'>
                <table class="table datatable my-0">
                    <thead>
                    <tr>
                        <th>Order#</th>
                        <th>Placed On</th>
                        <th>Item Name</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="text-black">
                    <?php foreach($orderdata as $key => $orederal){
                        if($orederal['status'] != 'deleted') {
                        echo '
                            <tr id="order_row_'.$orederal["id"].'">
                                <td>'.$orederal["invoice"].'</td>
                                <td>'.$orederal["date"].'</td>
                                <td>'.$orederal["productname"].'</td>
                                <td>Rs.'.$orederal["total"].'</td>
                                <td id="status_'.$orederal["id"].'">'.$orederal["status"].'</td>';

                                if($orederal['status'] == 'canceled'){
                                    echo' <td><a href="javascript:deleteorder('.$orederal["id"].')"> Delete</a> </td>';

                                }else{
                                    echo' <td><a href="javascript:cancelorder('.$orederal["id"].')"> Cancel</a> </td>';

                                }
                                echo'
                            </tr>
                        ';
                    }
                }
                    
                    ?>
                    
                   
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    </div>


</div>
<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Products Near Me</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row" id='reccomendation'>

			
    		</div>
    	</div>
    </section>
         
<?php require 'footer.php' ?>
<script src="script.js"></script>
<script>
      getLocation()

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var long = position.coords.latitude ;
  var lat = position.coords.longitude;
  $.ajax({
        url: "main/rcc.php",
        type: "POST",
        data: {
            'long' : long,
            'lat' : lat,
            'recomend' : 'true'},
        success:function(response){
            $('#reccomendation').html(response);
        }
  });

}
</script>

</html>
