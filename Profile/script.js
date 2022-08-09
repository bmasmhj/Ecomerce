
$('#newpw').keyup(function(){
    var n = $('#newpw').val();
    var c = $('#confpw').val();
    if( n != '' && c != ''){

    if( n==c ){
        $('#msg').html('*Password matched*');
        $('#msg').removeClass('text-danger');
        $('#msg').addClass('text-success');

    }else{
        $('#msg').html('Password not matched');
        $('#msg').addClass('text-danger');
        $('#msg').removeClass('text-success');
    }
}else{
        $('#msg').html('');

    }

});
$('#confpw').keyup(function(){
    var n = $('#newpw').val();
    var c = $('#confpw').val();
    if( n != '' && c != ''){
        if( n==c ){
            $('#msg').html('Password matched');
            $('#msg').removeClass('text-danger');
            $('#msg').addClass('text-success');
        }
        else{
            $('#msg').html('Password not matched');
            $('#msg').addClass('text-danger');
            $('#msg').removeClass('text-success');
        }
    }else{
        $('#msg').html('');

    }
});

function deleteorder(id){
    $.ajax({
        url: "main/delete.php",
        type: "POST",
        data: { 'deleteorder' : id },
        success:function(response){
        // alert(response);
        var result = $.trim(response);

        if(result == 'deleted'){
            document.getElementById('order_row_'+id).style.display = 'none';
        }
        }
    });
}

function cancelorder(id){
    $.ajax({
        url: "main/delete.php",
        type: "POST",
        data: { 'cancelorder' : id },
        success:function(response){
        // alert(response);
        var result = $.trim(response);

        if(result == 'cancel'){
            $('#status_'+id).html('canceled')
        }
        }
    });
}

$('#changeuserpw').click(function(){
    var o = $('#oldpw').val();
    var n = $('#newpw').val();
    var c = $('#confpw').val();
    if( n != '' && c != '' && o !=''){
        $.ajax({
            url: "main/update.php",
            type: "POST",
            data: { 'o':o , 'n' : n, 'c':c},
            success:function(response){
            // alert(response);
            var result = $.trim(response);

            if(result == 'oldwrong'){
                $('#msg').html('Old Password Wrong');
                $('#msg').removeClass('text-success');
                $('#msg').addClass('text-danger');
                $('#oldpw').val('');
            }
            else if(result == 'sucess'){
                $('#msg').html('Password Changed');
                $('#msg').removeClass('text-danger');
                $('#msg').addClass('text-success');
                $('#oldpw').val('');
                $('#newpw').val('');
                $('#confpw').val('');
                setTimeout(() => {
                    $('#msg').html('');  
                }, 3000);
                
            }
            else{
                $('#msg').html(response );
            }
            }
        });
    }
});

