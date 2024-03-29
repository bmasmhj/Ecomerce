<section class="ftco-section">
      <div class="container">
              <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Featured Products</span>
          <h2 class="mb-4">Our Products</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>   		
      </div>
      <div class="container">
          <div class="row">
              <?php foreach($productdata as $key => $productval) { ?>
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product">
                      <a href="details.php?a=<?php echo $productval['productcode'] ?>" class="img-prod"><img class="img-fluid fix-size" src="<?php echo $productval['image']?>">
                          <div class="overlay"></div>
                      </a>

                      <div class="text py-3 pb-4 px-3 text-center">
                          <h3><a href="details.php?a=<?php echo $productval['productcode']?>" id="productname_<?php echo $productval['id'] ?>"><?php echo $productval['name']?></a></h3>
                          <p><?php echo $productval['street']?></p>
                          
                          <div class="d-flex">
                              <div class="pricing">
                                  <p class="price">Rs. <span id="productprice_<?php echo $productval['id'] ?>"><?php echo $productval['price'] ?></span>/-</p>
                              </div>
                          </div>
                          <div class="bottom-area d-flex px-3">
                              <div class="m-auto d-flex">
                                  <a href="javascript:add_to_cart(<?php echo $productval['id'] ?>)" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                      <span><i class="ion-ios-cart"></i></span>
                                  </a>
                                  <a href="details.php?a=<?php echo $productval['productcode']?>" class="heart d-flex justify-content-center align-items-center ">
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
      