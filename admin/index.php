<?php
    $mysqli = new mysqli("localhost", "root", "", "mygps") or die("Cannot connect database."); 

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MariaDB: " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT * FROM location ORDER BY id";
	$result = $mysqli -> query($sql);    

    echo "<p align='center'><a href='addmap.php'>+ เพิ่มพิกัด</a></p>";

    echo "<table align='center' border='1' width='50%'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>name</th>";
    echo "<th>latitude</th>";
    echo "<th>longitude</th>";
    echo "<th>action</th>";
    echo "</tr>";
    while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td align='center'>".$row["id"]."</td>";
        echo "<td align='center'>".$row["name"]."</td>";
        echo "<td align='center'>".$row["lat"]."</td>";
        echo "<td align='center'>".$row["lon"]."</td>";
        echo "<td align='center'>[<a href='edit.php?id=".$row["id"]."'>Edit</a>] [<a href='delete-confirm.php?id=".$row["id"]."'>Delete</a>]</td>";
        echo "</tr>";
    }
    echo "</table>";

?>