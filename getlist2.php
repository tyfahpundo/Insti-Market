<?php

$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($dbname, $link);

$sql = "SELECT lga FROM lgas WHERE lga_id=" . $_REQUEST['id'];

$result = mysqli_query($con,$sql);


while ($row= mysqli_fetch_array($result)){

	echo '<option >'.$row['lga'].'</option>';
}



?>