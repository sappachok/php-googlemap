<?php
	header("Content-type: application/json; charset=utf-8");

    $mysqli = new mysqli("localhost", "root", "", "mygps") or die("Cannot connect database."); 

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

	$loc = array();

	$sql = "SELECT * FROM location ORDER BY id";
	$result = $mysqli -> query($sql);

	$no = 0;
	while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$loc[$no] = array("name"=>$row["name"], "lat"=>$row["lat"], "lon"=>$row["lon"]);

		$no++;
	}

	echo json_encode(array("data"=>$loc));
?>