<nav class="navbar">
        <a class="navbar-brand" href="../"><?php echo $websitename ?></a>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
        </nav>
        <div class="container">
            <div class="row">
            <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
            
            </div>
        </div>    <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <span class="heading">Personal Profile</span>|<a href="EditProfile" class="link" >Edit</a><br>
                            <br>
                            <span class="details ">
                            <?php echo $fetch_info['name'] ?><br>
                            <?php echo $fetch_info['email'] ?>
                            </span>
                            <br>
                            <br>

                            <a href="index.php">My Orders</a> <br>
                            <a href="../cart.php">My Cart ( <?php echo $carttotaldata ?> )</a>

                            <br>
                        </div>
                    </div>
                    <div class="card mt-2 p-2">
                        <div class="card-body">
                            <span class="ship">Billing Details</span>|<a href="billing.php" class="link" >Edit</a>
                            <h6 class="name"><?php echo $fetch_info['name'] ?></h6>
                            <span class="address">
                            <?php echo $address ?><br>
                                <?php echo $proviencename.' - '.$address.' , '.$districtname ?><br>
                                (977)-<?php echo $number ?>
                            </span>
                        </div>
                    </div>
                </div> <div class="col-md-8">