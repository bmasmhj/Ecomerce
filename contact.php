<?php require 'header.php' ?>

<section class="ftco-section contact-section ">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white shadow  p-4">
	            <p><span>Address:</span> <?php echo $websitelocation?></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white shadow  p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920"><?php echo $websitenum?></a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white shadow  p-4">
	            <p><span>Email:</span> <a href="mailto:<?php echo $websiteemail?>"><?php echo $websiteemail?></a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white shadow  p-4">
	            <p><span>Website</span> <a href="index.php"><?php echo $websitename?></a></p>
	          </div>
          </div>
        </div>
        <div class="row shadow block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form class="bg-white  p-5 contact-form needs-validation" id='contactpage' >
              <div class="form-group">
              <input required value="<?php echo $name?>" type="text" class="form-control " name="fname" id="fname" placeholder="Your Name">

              </div>
              <div class="form-group">
              <input required type="email" class="form-control" name="email" id="email" placeholder="Email : youremail@yourdomain.com" value="<?php echo $email?>">
              </div>
              <div class="form-group">
              <input required type="mailsub" class="form-control" name="mailsub" id="mailsub" placeholder="Subject">
              </div>
              <div class="form-group">
              <textarea class="form-control " required rows='10' name="mailmsgdeqa" id="mailmsg" placeholder="Type your message here.."></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submitedmailmsgqw" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
              <div class="row" id="sucessresultcontact">
                                        
              </div>
              <span id='messages'></span>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div class="bg-white  p-2">
              <div class="mapouter">
                  <div class="gmap_canvas">
                      <iframe width="600" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=Patan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <br>
                        <style>
                        .mapouter{position:relative;text-align:right;height:600px;width:600px;}
                        </style>
                        <style>.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:600px;}
                    </style>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

<?php require 'body/newsletter.php' ?>
<?php require 'footer.php' ?>

