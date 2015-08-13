<?php
function profile($slug){

	$query = "SELECT * FROM data WHERE slug='".$slug."'";
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result)) {
		echo $row['email']."</br>";
		echo $row['name']."</br>";
		echo '<img height="256" width="256" src="data:image;base64,'.$row['image'].' "></br> ';
		echo $row['city']."</br>";
		echo $row['zip']."</br>";
		echo $row['state']."</br>";
	}
}
?>