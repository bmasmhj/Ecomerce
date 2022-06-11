<?php require_once "controllerUserData.php"; 
 require 'checker.php';
  require 'header.php';
  require 'sidebar.php' ?>

        <div class="container text-black">
            <div class="row d-flex">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="controller/update.php" method='post'>
                            <label class="mx-2">Provience</label>
                                <select class="form-control text-uppercase" name="provience" id="provience" >
                                    <option selected disabled>- - - select province - - -</option>
                                    <?php foreach($proviences as $provience){ 
                                            if($provience['pname']!= 'NULL') {
                                                if($pid == $provience['pid']){
                                                    echo ' <option selected value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                                                }else{
                                                    echo ' <option value="'.$provience['pid'].'">'.$provience['pname'].'</option>';
                                                }
                                            }
                                        } 
                                    ?>
                                </select>
                  
                            <label class="mx-2">District</label>
                            <select name="district" id="district" class="form-control mb-2" id="">
                                <option selected disabled value="">--- SELECT DISTRICT</option>
                                <?php foreach($districts as $district){ 
                                            if($district['dname']!= 'NULL') { 
                                                if($did == $district['did']){
                                                    echo ' <option selected value="'.$district['did'].'">'.$district['dname'].'</option>'; 
                                                }else{
                                                    echo ' <option value="'.$district['did'].'">'.$district['dname'].'</option>'; 
                                                }
                                            } 
                                        } ?>
                            </select>
                            
                            <label class="mx-2">Street</label>
                            <input type="text" name='street' class="form-control mb-2" placeholder="Street" value='<?php echo $address?>'>
                            
                            <label class="mx-2">Phone Number</label>
                            <input type="number" maxlength="10" name='number' class="form-control mb-2" placeholder="Phone Number" value='<?php echo $number?>'>
                            <input type="submit" class="btn btn-info" value='Update'>
                        </form>
                    </div>
                </div>

            </div>
        </div>

<?php require 'footer.php' ?>
</html>

<script>
    $('#provience').change(function(){
        var pid = $('#provience').val();
        $.ajax({
            url : 'get_district.php',
            data: {'pid' : pid},
            method : 'post',
            dataType : 'text',
            success :function (response){
                $('#district').empty();

                $('#district').append(response);
            }
        });
    });
</script>