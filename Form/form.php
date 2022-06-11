<?php require 'info.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5 mb-5">
      <div class="card">
          <div class="card-body">
          <h4>Enter Product</h4>
            <form action="add.php" method='post' enctype="multipart/form-data" >
                <label for="name">Product Name</label>
                <input class="form-control mb-3" type="text" name="name" placeholder="Product name">

                <label for="name">Select Category</label>
                <select class="form-control mb-3" name="category" >
                    <option  selected disabled>Select category</option>
                    <?php foreach($categorys as $key => $categorysval){
                        echo ' <option  value="'.$categorysval['id'].'">'.$categorysval['name'].'</option>';
                            
                    }
                    ?>
                </select>

                <label for="name">Upload Thumbnail</label>
                <input class="form-control mb-3" type="file" name="thumbnail" placeholder="Thumbnail">

                <label for="name">Price</label>
                <input class="form-control mb-3" type="number" name="price" id="" placeholder='Price'>

                <label for="name">Quantity</label>
                <input class="form-control mb-3" type="number" name="quantity" id="">
                
                <label for="name">Quantity type</label>
                <select class="form-control mb-3" name="quantitytype" >
                    <option selected disabled>Select category</option>
                    <option value="Kg">KG</option>
                    <option value="Piece">Piece</option>

                </select>

                <label for="name"> Description</label>
                <textarea class="form-control mb-3" type="text" name="description" placeholder="Description"></textarea>

                <hr class="mt-5">
                <h4 class='text-center'> Location</h4>
                <hr class='mb-5'>
                <label for="name">Provience</label>
                <select class="form-control mb-3" class="form-control text-uppercase" name="provience" id="provience" >
                    <option selected disabled>- - - SELECT PROVIENCE - - -</option>
                    <?php foreach($proviences as $provience){ 
                            if($provience['pname']!= 'NULL') {
                                    echo ' <option  value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                            
                            }
                        } 
                    ?>
                </select>

                <label for="name">District </label>
                <select class="form-control mb-3" name="district" id="district" class="form-control mb-2" id="">
                    <option selected disabled value="">- - - SELECT DISTRICT - - -</option>
                </select>

                <label for="name">Street</label>
                <input class="form-control mb-3" type="text" name="street" placeholder="Street">


                <input class="form-control mb-3" type="submit" name="saveproduct" value='Save'>


     


               

            </form>
          </div>
      </div>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>