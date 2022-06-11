

<?php require "header.php"; require 'controller/globaldata.php'?>
<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
<?php require 'controller/cartanlyser.php' ?>
<form action="billing.php" method="post">
<?php
// $j=0;
for($k=0;$k<$j;$k++){

            ?> <input type="hidden" name="carts[]" value="<?php echo $i[$k]?>"> <?php
    }
?>
<section class="mb-5">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-5   text-left">
                                <span class="text-black"> Item Name </span> <br>
                                <span class="text-primary"><?php echo $item_name?>  </span></div>
                            <div class="col-md-3">Quantity <br> <span ><?php echo $quantity?></span></div>
                            <div class="col-md-3 ">Price <br><?php echo $equal?> </div>
                        </div>
                    </div>
                    <div class="col-md-5 border-left">
                        <h4 class="text-primary text-uppercase"> Summary</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <span class="text-uppercase ">Quantity  </span><br><br>
                                <span class="text-uppercase mt-2">Price  </span><br>
                            </div>
                            <div class="col-md-6">
                                <span> <?php echo $sumquantity?>  </span><br><br>
                                <spa class="mt-2">  Rs <?php echo $sumequal?>  </span><br>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <span class="text-uppercase mt-2">Total  </span><br>
                            </div>
                            <div class="col-md-6">
                                <span>  Rs <?php echo $total?>  </span><br>
                            </div>
                        </div>

                    </div>
                </div>
                <hr style="max-width: 100%!important; border-width: 1px!important; border-color: none!important;">

                <div class="row">
                    <div class="col-md-6 checkout-middle">
                        <h4>Shipping Address Detail </h4>
                            <div class="container">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" disabled  id="" value="<?php echo $fetch_info['name'] ?>" class="form-control">
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" disabled  id="" value="<?php echo $email?>" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <label class="mx-2">Provience</label>
                                    <select class="form-control text-uppercase" name="provience" id="provience" >
                                        <option selected disabled>- - - SELECT PROVIENCE - - -</option>
                                        <?php foreach($proviences as $provience){ 
                                                if($provience['pname']!= 'NULL') {
                                                    if($pid == $provience['pid']){
                                                        echo ' <option selected value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                                                    }else{
                                                        echo ' <option value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                                                    }
                                                }
                                            } 
                                        ?>
                                    </select>
                  
                                <label class="mx-2">District</label>
                                <select name="district" id="district" class="form-control mb-2" id="">
                                <option selected disabled value="">--- SELECT DISTRICT</option>
                                    <?php foreach($districts as $district){ 
                                                if($district['dname']!= 'NULL') { 
                                                    if($did == $district['did']){
                                                        echo ' <option selected value="'.$district['did'].'">'.$district['dname'].'</option>'; 
                                                    }else{
                                                        echo ' <option value="'.$district['did'].'">'.$district['dname'].'</option>'; 
                                                    }
                                                } 
                                            } ?>
                                </select>
                            
                            <label class="mx-2">Street</label>
                            <input type="text" name='street' class="form-control mb-2" placeholder="Street" value='<?php echo $address?>'>
                            
                                    <div class="form-group">
                                    <input type="hidden"   id="" name="email" value="<?php echo $email?>" class="form-control">
                                    <input type="hidden"   id="" name="uname" value="<?php echo $fetch_info['id']?>" class="form-control">
                                        <input type="text" name="number" id="" class="form-control" value=' <?php echo $fetch_info['num']; ?>' placeholder="Enter your Number" required>
                                    </div>



                                    <div class="form-group">

                                        <button type="submit" name="billing" id="" class="btn btn-success" Value="billing">Check Out</button>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>

<?php require 'footer.php' ?>

