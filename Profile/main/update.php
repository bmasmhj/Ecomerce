<?php 
    require '../connection.php';

if(isset($_POST['o']) && isset($_POST['n']) && isset($_POST['c'])){
    $old = $_POST['o'];
    $new = $_POST['n'];
    session_start();
    $email = $_SESSION['lpmsemail'] ;
    $password = $old;
    $chewckuser = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE usertable SET password = '$changepw' WHERE email = '$email' ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['password'] = $new;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }

}else if(isset($_POST['updatelmpsname'])){
    session_start();
    $email = $_SESSION['lpmsemail'] ;

    $name = $_POST['fullname'];
    $sql = "UPDATE usertable SET name = '$name' WHERE email = '$email' ";
    if ($con->query($sql)) {
        header('Location: ../EditProfile');
        exit();
    }

}
else if(isset($_POST['provience']) && isset($_POST['district'])){
    session_start();
    $did = $_POST['district'];
    $pid = $_POST['provience'];
    $street =  $_POST['street'];
    $num = $_POST['number'];
    $email = $_SESSION['lpmsemail'] ;
    $sql = "UPDATE usertable SET  `provience` = '$pid', `district` = '$did' ,`address`='$street', `num` = '$num'  WHERE email = '$email' ";
    if ($con->query($sql)) {
        header('Location: ../BillingAddress');
        exit();
    }

}

?>