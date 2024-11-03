<?php
    $mysqli = new mysqli("localhost", "root", "", "mygps") or die("Cannot connect database."); 

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MariaDB: " . $mysqli -> connect_error;
        exit();
    }

    if(@$_POST) {
        $name = $_POST["pointname"];
        $lat = $_POST["mlat"];
        $lon = $_POST["mlog"];        
        
        echo "<b>เพิ่มรายการ</b><br>";
        echo "Name: $name<br>";
        echo "Latitude: $lat<br>";
        echo "Longitude: $lon<br>";

        $sql = "INSERT INTO location (name, lat, lon) 
            values ('$name','$lat','$lon')";

		$result = $mysqli -> query($sql);
        if($result) {
			echo "เพิ่มข้อมูลเสร็จสิ้น<br>";
			header("Location: index.php");
		}
    }
        
?>