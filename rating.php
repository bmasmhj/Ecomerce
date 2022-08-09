
<?php 

$mus =  $_POST['c'];
$initialrate = "0";
session_start();
if(isset($_SESSION['musicusername'])){
$email = $_SESSION['musicusername'];
require 'backends/connection.php';
$initialrate = 0;
$ratesql = "SELECT  * FROM ratings WHERE email = '$email' AND musiccode = '$mus' ";
$rateresult = $con->query($ratesql);
$ratedata = [];
if ($rateresult->num_rows > 0) {
    while ($raterow = $rateresult->fetch_assoc()) {
        $initialrate = $raterow['ratenumber'];
    }
}else{
    $initialrate = 0;
} 
}




?>

<div class="my-rating-4"></div>
<span id="messagerate" class='p-2'>

</span>

<script>
var musiccode =  "<?php echo $mus; ?>";
var user =  "<?php echo $email; ?>";

var inr = <?php echo $initialrate; ?>  ;
$(".my-rating-4").starRating({
totalStars: 5,
emptyColor: 'lightgray',
hoverColor: 'salmon',
activeColor: 'cornflowerblue',
initialRating: inr,
strokeWidth: 0,
useGradient: false,
callback: function(currentRating){
    // alert('rated ' + currentRating);
    $.ajax({
        url: "backends/rate.php",
        type: "POST",
        data: { "rating" : musiccode, 
                "star" : currentRating,
                "user" : user },
        success:function(response){
            $('#messagerate').html(response);
       
        }
    });

}
});
</script>