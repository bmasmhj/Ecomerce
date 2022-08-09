<?php 
 require 'conn.php';

if(isset($_POST['newslettersub'])){
   

    $email = $_POST['newslettersub'];

    $duplicatesql = "SELECT  * FROM newsletter WHERE email = '$email' ";
    $duplicateresult = $con->query($duplicatesql);
    if ($duplicateresult->num_rows > 0) {
        echo 'duplicate';
    } else {
        $sql = "INSERT INTO `newsletter`(`email`) VALUES ('$email' )";
        $save =  mysqli_query($con, $sql);
        if($save){
            echo 'success';
        }else{
            // echo 'fail';
            die("insert failed $con->error");
        }
    } 

   
}
if(isset($_POST['mailmsgdeqa'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $msg = $_POST['mailmsgdeqa'];
    $sub = $_POST['mailsub'];
    $sql = "INSERT INTO `contact`(`fullname`, `email`,`subject`, `message`) VALUES ('$fname','$email' ,'$sub', '$msg')";
    $save =  mysqli_query($con, $sql);
    if($save){
        echo 'success';
    }else{
        echo 'fail';
        die("insert failed $con->error");

    }


}


?>