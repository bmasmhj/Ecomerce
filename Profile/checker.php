<?php $email = $_SESSION['lpmsemail'];
$password = $_SESSION['password'];
if($email != false && $password != false){
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
        $pid = $fetch_info['provience'];
        $number = $fetch_info['num'];

        $did = $fetch_info['district'];
        $address = $fetch_info['address'];

        $districtname = $fetch_info['districtname'];
        $proviencename = $fetch_info['provincename'];


        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
} 
 

if(isset($_SESSION['lpmsemail'])){
    $carttotaldata = 0;
    $em = $_SESSION['lpmsemail'];
    $productsql = "SELECT  * FROM cart WHERE email = '$em' ";
    $productresult = $con->query($productsql);
        if ($productresult->num_rows > 0) {
        while ($productrow = $productresult->fetch_assoc()) {
            $carttotaldata = $carttotaldata+1;

        }
    } 

    $ordersql = "SELECT  * FROM tbl_order WHERE email = '$em' ";
    $orderresult = $con->query($ordersql);
    $orderdata = [];
    if ($orderresult->num_rows > 0) {
        while ($orderrow = $orderresult->fetch_assoc()) {
            array_push($orderdata, $orderrow);
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