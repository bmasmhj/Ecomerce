<section class="ftco-section testimony-section">
    <div class="container">
    <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
          <h2 class="mb-4">Product Category</h2>
          <p>Choose your category to find product easily</p>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
				  <?php foreach($catdata as $key => $catevals) { 
echo '
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url('.$catevals["image"].')">
                            </div>
                            <div class="text text-center">
                            <p class="name">'.$catevals["name"].'</p>
                            </div>
                        </div>
                    </div> ';
                     } ?>
                                        
                </div>
            </div>
        </div>
    </div>
</section>