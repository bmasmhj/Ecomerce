function add_to_cart(id){
    var productname = $('#productname_'+id).text();
    var productprice = parseInt($('#productprice_'+id).text());
    var productid = parseInt(id);
    var quantity = $('#quantity').val();
    if(quantity){
      var q = quantity;
    }else{
      var q = 1;
    }

    $.ajax({
        url: "main/cartcontrller.php",
        type: "POST",
        data: {
            "productname" : productname  ,
            'productprice': productprice ,
            'quantity': q ,
             'productid' : productid ,
              'add_to_cart' : 'true'},
        success:function(response){
          alert('Added to cart');
          $('#cartdatatotal').html(response);

        }
  });
}

$('#newsletter').click(function(){
  // alert($('#subscribeemail').val());
  var apemail = $('#subscribeemail').val();
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(apemail.match(mailformat)){

    $.ajax({
      url: "main/adddata.php",
      type: "POST",
      data: { "newslettersub" : apemail},
      success:function(response){

        var result = $.trim(response);

            if(result == 'success'){
              $('#newslettermsg').html('Thank you for Subscribing ');
              $('#newslettermsg').addClass('text-success');
              $('#newslettermsg').removeClass('text-danger');
              $('#newslettermsg').removeClass('text-info');
              

            }else if(result == 'duplicate'){
              $('#newslettermsg').html('Thanks, but we have already sent you email 😇 '); 
              $('#newslettermsg').addClass('text-info');
              $('#newslettermsg').removeClass('text-danger');
              $('#newslettermsg').removeClass('text-success');

            }else{
              console.log(response);
            }
            }
      });

     


  }else if(apemail == '' ){
    $('#newslettermsg').html('Please type your email');
    $('#newslettermsg').addClass('text-danger');
    $('#newslettermsg').removeClass('text-info');
    $('#newslettermsg').removeClass('text-success');

  }else{
    $('#newslettermsg').html('Please type valid email');
 
    $('#newslettermsg').addClass('text-danger');


  }

  setTimeout(() => {
    $('#newslettermsg').html('');
  }, 3000);


})

function deletecartitem(id){
 if(confirm('Are you sure ?')==true){
   $.ajax({
    url: "main/cartcontrller.php",
    type: "POST",
    data: {
      "action" : "delete",
       "id" : id },
    success:function(response){
      document.getElementById('cart_item_'+id).style.display = "none";
      alert(response);
    }
});
 }


}


// removequantity
$('#addquantity').click(function(){
  var q =  parseInt($('#quantity').val());

  $('#quantity').val(q+1);

})
$('#removequantity').click(function(){
  var q =  parseInt($('#quantity').val());

  if(q<2){

  }else{
    $('#quantity').val(q-1);
  }

})

$(document).ready(function(){
  $("#cart").submit(function(){
if ($('input:checkbox').filter(':checked').length < 1){
      alert("Please Select atleast one product");
return false;
}
  });
});

$('#provience').change(function(){
  var pid = $('#provience').val();
  $.ajax({
      url : 'Profile/get_district.php',
      data: {'pid' : pid},
      method : 'post',
      dataType : 'text',
      success :function (response){
          $('#district').empty();

          $('#district').append(response);
      }
  });
});

$('#contactpage').on('submit', function(e) {
  e.preventDefault();
  const fname = $('#fname').val();
  const email = $('#email').val();
  const mailsub = $('#mailsub').val();

  const mailmsg = $('#mailmsg').val();

  if(fname!=''  & email!=''  & mailmsg!='' & mailsub!=''){

  $.ajax({
  url: "main/adddata.php",
  type: "POST",
  data: new FormData(this),
  contentType: false,
  processData: false,
  success:function(response){
      var result = $.trim(response);
      if(result == 'failed'){
          $('#messages').html('Failed while Saving data!');
          setTimeout(() => {
              $('#messages').html('');
          }, 800);
      }
      if(result == 'success'){
          $('#mailsub').val('');
              $('#mailmsg').val('');

          // $('#messages').html('Message received Successfully !');
          $('#sucessresultcontact').html(`<div class="col-10"> 
          <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
           <strong>Thank you - </strong>  We have recieved your message we will reply you soon!</div> </div>`);
          
           setTimeout(() => {
              $('#sucessresultcontact').html('');
             
              
           }, 3000);
      }
      else{
          $('#messages').html(response );
      }
  }
});
}
});
