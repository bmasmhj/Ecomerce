<?php 

if(!isset($_GET['q'])){
    header('Location: index.php');
    exit();
}


 ?>
<?php require 'header.php' ?>

<section class="ftco-section">
      <div class="container">
        <span>Search result for <strong>'<?php echo $_GET['q'] ?>'</strong></span>
          <div class="row mt-2">
              <?php if(isset($error)){ echo 'nodata'; }foreach($searchdata as $key => $searchval) { ?>
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product">
                      <a href="details.php?a=<?php echo $searchval['productcode'] ?>" class="img-prod"><img class="img-fluid fix-size" src="<?php echo $searchval['image']?>">
                          <div class="overlay"></div>
                      </a>
                      <div class="text py-3 pb-4 px-3 text-center">
                          <h3><a href="details.php?a=<?php echo $searchval['productcode']?>" id="productname_<?php echo $searchval['id'] ?>"><?php echo $searchval['name']?></a></h3>
                          <div class="d-flex">
                              <div class="pricing">
                                  <p class="price">Rs. <span id="productprice_<?php echo $searchval['id'] ?>"><?php echo $searchval['price'] ?></span>/-</p>
                                  
                              </div>
                          </div>
                          <div class="bottom-area d-flex px-3">
                              <div class="m-auto d-flex">
                                  <a href="javascript:add_to_cart(<?php echo $searchval['id'] ?>)" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                      <span><i class="ion-ios-cart"></i></span>
                                  </a>
                                  <a href="details.php?a=<?php echo $searchval['productcode']?>" class="heart d-flex justify-content-center align-items-center ">
                                      <span><i class="ion-ios-eye"></i></span>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>
      </div>
  </section>
      

<?php require 'model/featuredprod.php' ?>
<?php require 'model/newsletter.php' ?>
<?php require 'footer.php' ?>
