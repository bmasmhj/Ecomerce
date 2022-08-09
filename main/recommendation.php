<?php

require_once("main/recommend.php");

$re = new Recommend();

require 'main/conn.php';

$user = "SELECT email FROM usertable";
$user_result = $con->query($user);
if($user_result->num_rows > 0){
    while ($user_row = $user_result->fetch_assoc()) {
        $username = $user_row['email'];
        $rating = "SELECT * FROM ratings WHERE username = '$username'";
        $rating_result = $con->query($rating);
        if($rating_result->num_rows > 0){
            while ($rating_row = $rating_result->fetch_assoc()) {
                $r = $rating_row["title"];
                $datasets[$username][$r] = $rating_row['ratenumber'];
            }
        }
    }
       
}
$users = $_SESSION['lpmsemail'];
$dataset = $datasets;
$recommended_items = $re->getRecommendations($dataset, $users);
$returned = array_keys($recommended_items);

// print_r($dataset);


?>
 <header>
        <h3 class="headingtag">You may also like</h3>
</header>
<div class="items" id="newmusic">
    <?php 
    $len = count($returned);
    for($p= 0 ; $p < $len ; $p++){ 
        $code = $returned[$p]; 
        $cresultsql = "SELECT  * FROM product WHERE productcode = '$code'";
        $cresultresult = $con->query($cresultsql);
        if ($cresultresult->num_rows > 0) {
        while ($cresultrow = $cresultresult->fetch_assoc()) {
            
        }
            
        }

    } ?>

</div>