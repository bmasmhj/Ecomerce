<?php require 'header.php' ?>
<?php require 'body/crosel.php' ?>
<?php require 'body/category.php' ?>
<?php require 'body/featuredprod.php' ?>
<?php require 'body/similar.php' ?>

<?php require 'body/newsletter.php' ?>

<script>
      getLocation()

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var long = position.coords.latitude ;
  var lat = position.coords.longitude;
  $.ajax({
        url: "main/rcc.php",
        type: "POST",
        data: {
            'long' : long,
            'lat' : lat,
            'recomend' : 'true'},
        success:function(response){
            $('#reccomendation').html(response);
        }
  });

}
</script>
<?php require 'footer.php' ?>
