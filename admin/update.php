<?php
    $mysqli = new mysqli("localhost", "root", "", "mygps") or die("Cannot connect database."); 

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MariaDB: " . $mysqli -> connect_error;
        exit();
    }

    if(@$_POST) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $lat = $_POST["lat"];
        $lon = $_POST["lon"];
        $save = $_POST["save"];
        
        echo "<b>แก้ไขรายการ</b><br>";
        echo "Id: $id<br>";
        echo "Name: $name<br>";
        echo "Latitude: $lat<br>";
        echo "Longitude: $lon<br>";

        $sql = "UPDATE location
            SET name='$name',lat='$lat',lon='$lon'
            WHERE id='$id'
        ";        

		$result = $mysqli -> query($sql);
        if($result) {
			echo "แก้ไขข้อมูลเสร็จสิ้น<br>";
			header("Location: index.php");
		}
    }
        
?>