<?php 

?>
<?php require 'header.php' ?>
<?php

if ($proctresult->num_rows > 0) {
    while ($proctrow = $proctresult->fetch_assoc()) {

?>
<link rel="stylesheet" href="assets/css/star-rating-svg.css">

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate fadeInUp ftco-animated">
                <a href="<?php echo $proctrow['image']; ?>" class="image-popup"><img src='<?php echo $proctrow['image']; ?>' class="img-fluid"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate fadeInUp ftco-animated">
                <h3 id='productname_<?php echo $proctrow['id']?>'><?php echo $proctrow['name']?></h3>
                <div class="rating d-flex">

                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;"> <span style="color: #bbb;">Rating :</span></a>
                        </p>
                <div class="my-rating"></div> 
                <br>
                     
                    </div>
                    <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;"><span style="color: #bbb;">Quantity : </span><?php echo $proctrow['quantity'].' '.$proctrow['quantityname']?></a>
                        </p>
                <p class="price"><span>Rs <span id='productprice_<?php echo $proctrow['id']?>'><?php echo $proctrow['price']?></span> /-</span></p>
                <p><?php echo $proctrow['description']?> </p>
                    <div class="row mt-4">
                     
                        <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
                    <button type="button" class="quantity-left-minus btn" id='removequantity'>
                    <i class="ion-ios-remove"></i>
                    </button>
                    </span>
                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                <span class="input-group-btn ml-2">
                    <button type="button" class="quantity-right-plus btn" id='addquantity'>
                        <i class="ion-ios-add"></i>
                    </button>
                </span>
            </div> 
        </div>
        <p>
        <?php 


?>

            <?php
                if($proctrow['status'] == 'out of stock'){ ?>
            <a href="javascript:void()" class="btn btn-black py-3 px-5">Out of Stock</a>

<?php                }else { ?>
    <a href="javascript:add_to_cart(<?php echo $proctrow['id']?>)" class="btn btn-black py-3 px-5">Add to Cart</a>

                <?php }
            ?>
        

        </p>
            </div>
        </div>
    </div>
</section>
<?php } }else{
    echo 'not found';
}
?>
  <?php require 'body/similar.php' ?>


    <?php require 'body/newsletter.php' ?>

<?php require 'footer.php' ?>
<script src='assets/js/jquery.star-rating-svg.min.js'></script>
<script src='assets/js/jquery.star-rating-svg.js'></script>


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