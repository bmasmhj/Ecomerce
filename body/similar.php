<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Recommended Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">

			
			<?php 
			
			if(isset($_SESSION['lpmsemail'])){
				require 'main/recommendation.php';
			}else {

			
			?>
            <!-- Algorithm here  -->
                <?php for($i = 0 ; $i<4 ; $i++) {?>
    			<div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="assets/images/product-2.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#" id="productname">Product Name</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span id="productprice">$120.00</span></p>
		    						<p>Location</p>

		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-eye"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                <?php }
				} ?>
    		</div>
    	</div>
    </section>
