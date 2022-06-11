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

         
<?php require 'footer.php' ?>
<script src="script.js"></script>

</html>
