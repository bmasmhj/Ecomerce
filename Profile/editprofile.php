<?php require_once "controllerUserData.php"; 
 require 'checker.php';
  require 'header.php' ;require 'sidebar.php' ?>


<div class="container text-black">
    <div class="row d-flex">
        <div class="card w-100 ">
            <div class="card-body">
                <form action="main/update.php" method='post'>
                    <input type="text" class="form-control" name='fullname' placeholder="Full Name" value='<?php echo $fetch_info['name']?>'>
                    <input type="text" class="disabled form-control mt-2" disabled placeholder="<?php echo $fetch_info['email']?>">
                    <input type="submit" name='updatelmpsname' class="mt-2 btn btn-success" value='Update'>
                </form>
                    <h6 class="mt-3 mx-2 mb-2">Change Password
                    <small id="msg"></small>
                         </h6>

                    <input type="password" id="oldpw" class="form-control mt-2" placeholder="Old Password" >
                    <input type="password" id="newpw" class="form-control mt-2" placeholder="New Password" >
                    <input type="password" id="confpw" class="form-control mt-2" placeholder="Confirm Password" >
                    <button class="mt-2 btn btn-danger" id='changeuserpw' > Change Password </button>

            </div>
        </div>

    </div>
</div>

         
<?php require 'footer.php' ?>
</html>

<script src="script.js"></script>