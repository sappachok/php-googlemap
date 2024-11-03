<?php
    $mysqli = new mysqli("localhost", "root", "", "mygps") or die("Cannot connect database."); 

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MariaDB: " . $mysqli -> connect_error;
        exit();
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM location WHERE id='$id'";
	$result = $mysqli -> query($sql);

    $row = $result -> fetch_array(MYSQLI_ASSOC)
?>    
<p><a href="index.php">กลับไป</a></p>
<form action="update.php" method="post">
    <p>
        <label>Id</label><br>        
        <input type="text" name="id" value="<?php echo $row["id"]; ?>">
    </p>    
    <p>
        <label>Name</label><br>        
        <input type="text" name="name" value="<?php echo $row["name"]; ?>">
    </p>
    <p>
        <label>Latitude</label><br>        
        <input type="text" name="lat" value="<?php echo $row["lat"]; ?>">
    </p>
    <p>
        <label>Longitude</label><br>        
        <input type="text" name="lon" value="<?php echo $row["lon"]; ?>">
    </p>
    <p>
        <button type="submit" name="save" value="true">บันทึกแก้ไข</button>
    </p>             
</form>