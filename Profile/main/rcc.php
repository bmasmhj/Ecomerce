<?php
$user_latitude =  $_POST['lat'];
$user_longitude = $_POST['long'];
 $con = mysqli_connect('localhost','root','','lpms');
$sql = "SELECT * FROM product ORDER BY id asc";
$result = $con->query($sql);
$data = [];
if($result->num_rows > 0) {
  $i = 0;
  while($row = $result->fetch_assoc()) {
    $data[$i]['id'] = $row['id'];
    $data[$i]['distance'] =  twopoints_on_earth($user_latitude, $user_longitude,$row['lat'],$row['lng']);
   $i++;
  }
}

array_sort_by_column($data, 'distance');
// $np["data"] = $data[0]['id'];
// echo json_encode($np);

// echo '<pre>';

// print_r($data);

$len = count($data);
// echo '<br>';
for($r = 0 ; $r < $len ; $r++ ){
    $pid = $data[$r]['id'];
    fetchhere($pid);
   

}

function fetchhere($id){
 $con = mysqli_connect('localhost','root','','lpms');

  $sid = $id;
  $sql = "SELECT * FROM product WHERE id = '$sid' ";
  $result = $con->query($sql);
  $data = [];
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-6 col-lg-3 ">
        <div class="product">
            <a href="details.php?a='.$row['productcode'].'" class="img-prod"><img class="img-fluid fix-size" src="'.$row['image'].'">
                <div class="overlay"></div>
            </a>

            <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="details.php?a='.$row['productcode'].'" id="productname_'.$row['id'] .'">'.$row['name'].'</a></h3>
                <p>'.$row['street'].'</p>
                <div class="d-flex">
                    <div class="pricing">
                        <p class="price">Rs. <span id="productprice_'.$row['id'] .'">'.$row['price'] .'</span>/-</p>
                    </div>
                </div>
                <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                        <a href="javascript:add_to_cart('.$row['id'] .')" class="buy-now d-flex justify-content-center align-items-center mx-1">
                            <span><i class="ion-ios-cart"></i></span>
                        </a>
                        <a href="details.php?a='.$row['productcode'].'" class="heart d-flex justify-content-center align-items-center ">
                            <span><i class="ion-ios-eye"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
   }
} 
}

function twopoints_on_earth($latitudeFrom, $longitudeFrom, $latitudeTo,  $longitudeTo){
  $long1 = deg2rad($longitudeFrom);
  $long2 = deg2rad($longitudeTo);
  $lat1 = deg2rad($latitudeFrom);
  $lat2 = deg2rad($latitudeTo);
  //Haversine Formula
  $dlong = $long2 - $long1;
  $dlati = $lat2 - $lat1;
  $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
  $res = 2 * asin(sqrt($val));
  $radius = 3958.756;
  return ($res*$radius);
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
  $sort_col = array();
  foreach ($arr as $key => $row) {
    $sort_col[$key] = $row[$col];
  }
  array_multisort($sort_col, $dir, $arr);
}
?>

