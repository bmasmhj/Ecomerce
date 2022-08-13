<?php if(!isset($_POST['provience']) && !isset($_POST['district']) && !isset($_POST['district']) && !isset($_POST['uname']) && !isset($_POST['number'])   ){   header('Location: Profile');
    exit();}?>

<?php require 'header.php' ?>


    <?php require 'billincontoler.php' ?>

    <section class="ftco-section container">
    <div class="card" id='saveit'>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 flex-grow-1">
                    <h4><?php echo $websitename ?></h4>
                    <h6><?php echo $websitelocation ?></h6>
                </div>
                <div class="col-md-3 ">
                    <span class="d-block">Email : <?php echo $websiteemail?></span>
                    <span class="d-block">Number : <?php echo $websitenum?>212</span>
                </div>
            </div>
            <hr>
            <div class="">
                <h5>Invoice : #<small><strong><?php echo $invoice ?></strong></small></h5>
                <h6>Date Issued : <?php echo $date ?></h6>
            </div>
            <hr>
            <div class="row p-3">
                <h6 class="mx-4 d-block">Full name : <?php echo $fetch_info['name']?> </h6> <br>
                <h6 class="mx-4 d-block">Address : <?php echo $nowl ?> </h6> <br>
                <h6 class="mx-4 d-block">Phone : <?php echo $_POST['number']?> </h6> <br>
            </div>
            <hr>

            <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-5   text-left">
                                <h6 class="text-black"> Item Name </span> <br>
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
                                <span>  Rs <?php echo $r?>  </span><br>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                
            </div>  
    </div>
    <div class="row align-items-center justify-content-center">
            <button class="mt-2 btn btn-info" id='save_invoice'>Download Bill</button>
        </div>
    </section>
        
    <script src="assets/js/html2canvas.min.js"></script>

    <?php require 'body/newsletter.php' ?>
    <?php require 'footer.php' ?>

    <script>
        $(document).ready(function () {

    var filenames = "<?php echo $filename?>";

    $("#save_invoice").on('click', function () {
    html2canvas(document.getElementById("saveit"),
        {
            allowTaint: true,
            useCORS: true
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = filenames;
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    });

    setTimeout(() => {
    document.getElementById('save_invoice').click();

    }, 1000);

    });
    </script>