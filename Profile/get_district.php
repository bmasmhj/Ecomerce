<?php 
$pid = $_POST['pid'];

require 'connection.php';


$sql = "SELECT * FROM districts where p_id = $pid ORDER BY dname";
$result = $con->query($sql);

$html = "<option selected disabled>- - - SELECT DISTRICT - - -</option>";
if ($result->num_rows > 0) {
	while($district = $result->fetch_assoc()){
		$html .=  "<option value='" . $district['did'] . "'>$district[dname]</option>";
	}
}
echo $html;
?>