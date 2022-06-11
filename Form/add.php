<?php


require 'connection.php';

if(isset($_POST['saveproduct'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $quantitytype = $_POST['quantitytype'];

    

    $pid = $_POST['provience'];
    $did = $_POST['district'];
    $street = $_POST['street'];

    $randcode =  uniqid();

    $names = $name.$category.$randcode;
    $codez = str_replace( " " , "_" ,$names);
    $productcode = strtolower($codez);

    $sql = "SELECT * FROM province WHERE pid = '$pid'";
    $result = $con->query($sql);
    $proviences = [];
    if ($result->num_rows > 0) {
        while($proviencerow = $result->fetch_assoc()){
             $provience = $proviencerow['pname'];
        }
        
    }
    $sql = "SELECT * FROM districts WHERE did = '$did'";
    $result = $con->query($sql);
    $districts = [];
    if ($result->num_rows > 0) {
        while($districtrow = $result->fetch_assoc()){
            $district = $districtrow['dname'];
        }
        
    }

    $location =$provience.', '.$district.' - '.$street;
    echo $location;

    if (isset($_FILES['thumbnail'])) {
        $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['thumbnail']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $imgname = "img/".$url;
            $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $imgname);
            $imageofrecord = $url;
          }
      }
      else{
          echo "file unp";
      }
    }

    $sql = "INSERT INTO `product`( `name`, `productcode`, `category`, `image`, `price`, `description`, `rating`, `quantity`, `quantityname`, `ratingcount`, `location`, `pid`, `did`, `street`, `status`) VALUES 
                        ('$name','$productcode','$category','$imageofrecord','$price','$description','0','$quantity','$quantitytype','0','$location','$pid','$did','$street','0')";
 if($con->query($sql)){
    header('Location: form.php?success');
}

}


?>