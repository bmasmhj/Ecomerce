<?php 


require 'conn.php';

$catsql = "SELECT  * FROM category WHERE status = 0 ";
$catresult = $con->query($catsql);
$catdata = [];
    if ($catresult->num_rows > 0) {
    while ($catrow = $catresult->fetch_assoc()) {
        array_push($catdata, $catrow);
    }
} 


$productsql = "SELECT  * FROM product WHERE status = 'featured' ";
$productresult = $con->query($productsql);
$productdata = [];
    if ($productresult->num_rows > 0) {
    while ($productrow = $productresult->fetch_assoc()) {
        array_push($productdata, $productrow);
    }
} 



if(isset($_GET['a'])){
    $code = $_GET['a'];
    $proctsql = "SELECT  * FROM product WHERE productcode = '$code' ";
    $proctresult = $con->query($proctsql);
 
    
}

if(isset($_GET['q'])){
    $code = $_GET['q'];
    $searchsql = "SELECT  * FROM product WHERE (productcode LIKE '%$code%') OR (name LIKE '%$code%')  OR (description LIKE '%$code%') OR (location LIKE '%$code%')   ";
    $searchresult = $con->query($searchsql);
    $searchdata = [];

    if ($searchresult->num_rows > 0) {
        while ($searchrow = $searchresult->fetch_assoc()) {
            array_push($searchdata, $searchrow);

        }
    }else{
        $error = 'nodata';
    }    
    
}


if(isset($_GET['c'])){
    $code = $_GET['c'];
    
    $catsql = "SELECT  * FROM category WHERE catcode = '$code' ";
    $catresult = $con->query($catsql);
    $catprodata = [];
        if ($catresult->num_rows > 0) {
            while ($catrow = $catresult->fetch_assoc()) {
                $categid = $catrow['id'];
                $catrowname = $catrow['name'];

            $catprosql = "SELECT  * FROM product WHERE category = '$categid' ";
            $catproresult = $con->query($catprosql);
            if ($catproresult->num_rows > 0) {
                while ($catprorow = $catproresult->fetch_assoc()) {
                    array_push($catprodata, $catprorow);
            }
        }
    }
    

        }
    
    
}
if(isset($_SESSION['lpmsemail'])){
    $carttotaldata = 0;
    $eml = $_SESSION['lpmsemail'];
    $productsql = "SELECT  * FROM cart WHERE email = '$eml'";
    $productresult = $con->query($productsql);
        if ($productresult->num_rows > 0) {
        while ($productrow = $productresult->fetch_assoc()) {
            $carttotaldata = $carttotaldata+1;

        }
    } 
    
}
else if(isset($_SESSION['shopping_cart']))
{

    $total = 0;
        
    $cookie_data = stripslashes($_SESSION['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
        $total = $total+1;
    }
    $carttotaldata = $total;
}else {
    $carttotaldata = 0;
}


$websitename = 'Ramesh Dhami';
$websitenum = '+977 9845 454545';
$websiteemail = 'rameshdhami@email.com';
$websitelocation = 'Patan Lalitpur , 44700 - Nepal';
$pid = '';
$did = '';

$websitefb = '';
$websitetwitter = '';
$websiteinsta = '';
$lpmsname = 'Login';
$name = '';
$email = '';

$websitedetailsql = "SELECT  * FROM websitedetail LIMIT 1";
$websitedetailresult = $con->query($websitedetailsql);
    if ($websitedetailresult->num_rows > 0) {
    while ($websitedetailrow = $websitedetailresult->fetch_assoc()) {
        $websitename = $websitedetailrow['name'];
        $websitenum = $websitedetailrow['num'];
        $websiteemail = $websitedetailrow['email'];
        $websitelocation = $websitedetailrow['locaation'];

        $websitefb = '';
        $websitetwitter = '';
        $websiteinsta = '';
    }
} 

$userinfo ='';


if(isset($_SESSION['lpmsemail']) && isset($_SESSION['password'])){
    $email = $_SESSION['lpmsemail'];
    $password = $_SESSION['password'];
    $sql = "SELECT u.* , d.dname as districtname , p.pname as provincename
    FROM usertable u
    JOIN districts  d
    ON u.district = d.did
    JOIN province p
    ON  p.pid=u.provience
    WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $userId = $fetch_info['id'];
        $name = $fetch_info['name'];
        $pid = $fetch_info['provience'];
        $email = $_SESSION['lpmsemail'];

        $did = $fetch_info['district'];
        $address = $fetch_info['address'];
        $number = intval($fetch_info['num']);
        $userinfo = $fetch_info['email'];
        $districtname = $fetch_info['districtname'];
        $proviencename = $fetch_info['provincename'];


        $lpmsname=substr( $fetch_info['name'], 0, strrpos($fetch_info['name'], ' '));
        if($status == "verified"){
            if($code != 0){
                header('Location: Profile/reset-code.php');
            }else if($code == 0){
                $userId = $fetch_info['id'];
            }
        }else{
            header('Location: Profile/user-otp.php');
        }

                
    }
}

$sql = "SELECT * FROM province ORDER BY pid";
$result = $con->query($sql);
$proviences = [];
if ($result->num_rows > 0) {
    while($provience = $result->fetch_assoc()){
        array_push($proviences, $provience);
    }
    
}

$discsql = "SELECT * FROM districts WHERE p_id = '$pid' ";
    $result = $con->query($discsql);
    $districts = [];
    if ($result->num_rows > 0) {
        while($district = $result->fetch_assoc()){
            array_push($districts, $district);
        }

    }
?>
