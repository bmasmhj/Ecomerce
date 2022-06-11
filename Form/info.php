

<?php  


require 'connection.php';

$sql = "SELECT * FROM province ORDER BY pid";
$result = $con->query($sql);
$proviences = [];
if ($result->num_rows > 0) {
    while($provience = $result->fetch_assoc()){
        array_push($proviences, $provience);
    }
    
}

$csql = "SELECT * FROM category ORDER BY id";
$result = $con->query($csql);
$categorys = [];
if ($result->num_rows > 0) {
    while($category = $result->fetch_assoc()){
        array_push($categorys, $category);
    }
    
}



if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM districts where p_id = $pid ORDER BY dname";
    $result = $con->query($sql);

    $html = "<option selected disabled>- - - SELECT DISTRICT - - -</option>";
    if ($result->num_rows > 0) {
        while($district = $result->fetch_assoc()){
            $html .=  "<option value='" . $district['did'] . "'>$district[dname]</option>";
        }
    }
    echo $html;
}

?>