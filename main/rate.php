<?php 

require 'connection.php';
if(isset($_POST['rating']) && isset($_POST['star']) && isset($_POST['user']) ){
    session_start();
    if(isset($_SESSION['musicusername'])){
        $re = $_POST['star'];
        $musiccode = $_POST['rating'];
        $email = $_SESSION['musicusername'];

        $ratesql = "SELECT  * FROM ratings WHERE email = '$email' AND musiccode = '$musiccode' ";
        $rateresult = $con->query($ratesql);
        $ratedata = [];
        if ($rateresult->num_rows > 0) {
            while ($raterow = $rateresult->fetch_assoc()) {
                $initialrate = $raterow['ratenumber'];
            }
            $update = "UPDATE `ratings` SET `ratenumber`='$re' WHERE  email = '$email' AND musiccode = '$musiccode'";
            if($con->query($update)){
                $sql = "UPDATE `music` SET  rating = rating-$initialrate+$re WHERE `musiccode`='$musiccode' ";
                if($con->query($sql)){
                    echo "Thank's for rating ".$re." stars";
                }
            }
        }else{
            $insert = "INSERT INTO `ratings`(`email`, `musiccode`, `ratenumber`) VALUES ('$email' ,'$musiccode' ,'$re')";
            if($con->query($insert)){
                $sql = "UPDATE `music` SET ratingcount = ratingcount+1 , rating = rating+$re WHERE `musiccode`='$musiccode' ";
                if($con->query($sql)){
                    echo "Thank's for rating ".$re." stars";

                }

            }
        } 

       
    }
}

?>