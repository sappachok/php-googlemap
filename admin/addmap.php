<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> <!-- Responsive website -->
    <title>GPS Tracker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<?php
    include("../config.php");
?>

<body>
<div style="width:100%;">
    <br>
	<p><a href="index.php">กลับไป</a></p>
    <strong>บันทึกข้อมูลพิกัดแผนที่</strong><br>
	<FORM METHOD=POST action="insert.php"  >
    ชื่อสถานที่ :<INPUT TYPE='text' NAME='pointname' id='pointname' size=40><br>
    ค่าละติดจูด :<INPUT TYPE='text' NAME='mlat' id='mlat' readonly><br>
    ค่าลองติดจูด :<INPUT TYPE='text' NAME='mlog' id='mlog' readonly><br>
	<input type="submit" value="Save">
	</form>
    </div>
    <br>

    <div id="GoogleMap" style="width:80%;height:500px;"></div>
    <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
                var map;
                var my_Marker=[];    
                var my_Marker1=[];  

				  function initMap(address) {
						map = new google.maps.Map(document.getElementById('GoogleMap'), {
							center: {lat: 8.43, lng: 99.95},
							zoom: 10
						});

						infoWindow = new google.maps.InfoWindow;
   
						map.markers = [];

						// Try HTML5 geolocation.
						if (navigator.geolocation) {
								navigator.geolocation.getCurrentPosition(function(position) {
										var pos = {
											  lat: position.coords.latitude,
											  lng: position.coords.longitude,
											  mapTypeControl:true,
											  navigationControl:true
										};
										var pos1 = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
										var my_Marker = new google.maps.Marker({ // สร้างตัว marker  
												position: pos1,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
												map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
												icon:"../new_marker.png",  
													draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้  
													title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" , // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
											}); 
										map.setCenter(pos);

										// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร   
										google.maps.event.addListener(my_Marker, 'dragend', function() {
											var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
											map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker        
											$("#mlat").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
											$("#mlog").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
										});     						
          					  }, function() {
          						handleLocationError(true, infoWindow, map.getCenter());
          					  });
          				} else {
          					  // Browser doesn't support Geolocation
          					  handleLocationError(false, infoWindow, map.getCenter());
          				}
				}

    $(function(){
        $("<script/>", {
        "type": "text/javascript",
        src: "https://maps.google.com/maps/api/js?v=3.2&key=<?php echo $api_key; ?>&sensor=false&language=th&callback=initMap"
        }).appendTo("body");    
    });

    </script>  

    <div><br>
</body>
</html>


