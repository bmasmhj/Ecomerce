<?php 

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
