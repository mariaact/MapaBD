<html> 
<head>
	<style>
		#map {
			width: 100%;
			height: 600px;
			box-shadow: 5px 5px 5px #888;
		}

		.center {
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="#">
	<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
</head>

 <body>
 <!-- <img class="center" src="../images/logoMadWaySinFondo(1).png" height="250px"> -->
	<div id='map'></div>
 <!--	<script src="./script.js"></script> -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madwayTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 $query = "SELECT icon_category, image_icon FROM icon;";
 //$query = "SELECT image_icon FROM icon WHERE icon_category = "IconoMonumento";";
 $result = mysqli_query($conn, $query); 
 
 $queryP = "SELECT description_place, schedule, latitude, longitude FROM place;";
 $resultP = mysqli_query($conn, $queryP); 
 
 $queryT = "SELECT name, description_tag FROM tag;";
 $resultT = mysqli_query($conn, $queryT); 
 
?>

<table>
     <tr>
       <td>icon_category</td> 
       <td>image_icon</td>
      <tr>
      <tr>
        <td>description_place</td>
       <td>schedule</td>
       <td>latitude</td>
       <td>longitude</td>
      <tr>
      <tr>
        <td>name</td>
       <td>description_tag</td>
      <tr>
      
 <?php	


 $icon_category = array();
 $image_icon = array();
 $cont = 0;
 while($row = mysqli_fetch_array($result)){ 
 	
	//printf("<tr><td>%s</td><td>%s</td></tr>", $row["icon_category"],$row["image_icon"]); 
	$icon_category[$cont] = ($row["icon_category"]);
	$image_icon[$cont] = ($row["image_icon"]);
	$cont = $cont + 1;
 } 
 

 $description_place = array();
 $schedule = array();
 $latitude = array();
 $longitude = array();
 $cont1 = 0;
 while($row = mysqli_fetch_array($resultP)){ 
	//printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$row["description_place"],$row["schedule"],$row["latitude"],$row["longitude"]); 
	$description_place[$cont1] = ($row["description_place"]);
	$schedule[$cont1] = ($row["schedule"]);
	$latitude[$cont1] = ($row["latitude"]);
	$longitude[$cont1] = ($row["longitude"]);
	$cont1 = $cont1 + 1;
 } 
 

 $name = array();
 $description_tag = array();
 $cont2 = 0;
 while($row = mysqli_fetch_array($resultT)){ 
	//printf("<tr><td>%s</td><td>%s</td></tr>", $row["name"],$row["description_tag"]); 
	$name[$cont2] = ($row["name"]);
	$description_tag[$cont2] = ($row["description_tag"]);
	$cont2 = $cont2 + 1;
 } 
 
 ?>
 
 </table> 
<script>


var Icono = L.icon({
  iconUrl: "https://vivaelsoftwarelibre.com/wp-content/uploads/2020/05/icono.png",
  iconSize: [30, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoVerde = L.icon({
  iconUrl: "<?php echo $image_icon[1] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoMonumento = L.icon({
  iconUrl: "<?php echo $image_icon[0] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoWifi = L.icon({
  iconUrl: "<?php echo $image_icon[4] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoMusica = L.icon({
  iconUrl: "<?php echo $image_icon[5] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoCine = L.icon({
  iconUrl: "<?php echo $image_icon[10] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoIglesia = L.icon({
  iconUrl: "<?php echo $image_icon[12] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoComida = L.icon({
  iconUrl: "<?php echo $image_icon[7] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoBar = L.icon({
  iconUrl: "<?php echo $image_icon[6] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoBancos = L.icon({
  iconUrl: "<?php echo $image_icon[9] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoFarmacias = L.icon({
  iconUrl: "<?php echo $image_icon[8] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoSuper = L.icon({
  iconUrl: "<?php echo $image_icon[13] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoEmpresa = L.icon({
  iconUrl: "<?php echo $image_icon[11] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoDeportes = L.icon({
  iconUrl: "<?php echo $image_icon[0] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

var IconoParqueAtracciones = L.icon({
  iconUrl: "<?php echo $image_icon[3] ?>",
  iconSize: [40, 40],
  iconAnchor: [15, 40],
  shadowUrl: "<?php echo $image_icon[14] ?>",
  shadowSize: [35, 50],
  shadowAnchor: [0, 55],
  popupAnchor: [0, -40]
});

/*
let locationData = 
[{Coordenadas: ["<?php echo $latitude[0] ?>", "<?php echo $longitude[0] ?>"], Nombre : "<?php echo $description_place[0] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas : ["<?php echo $latitude[1] ?>", "<?php echo $longitude[1] ?>"], Nombre : "<?php echo $description_place[1] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas : ["<?php echo $latitude[2] ?>", "<?php echo $longitude[2] ?>"], Nombre : "<?php echo $description_place[2] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas : ["<?php echo $latitude[3] ?>", "<?php echo $longitude[3] ?>"], Nombre : "<?php echo $description_place[3] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas : ["<?php echo $latitude[4] ?>", "<?php echo $longitude[4] ?>"], Nombre : "<?php echo $description_place[4] ?>", Icono: "<?php echo $icon_category[10] ?>"},

{Coordenadas : ["<?php echo $latitude[5] ?>", "<?php echo $longitude[5] ?>"], Nombre : "<?php echo $description_place[5] ?>", Icono: "<?php echo $icon_category[2] ?>"},

{Coordenadas : ["<?php echo $latitude[6] ?>", "<?php echo $longitude[6] ?>"], Nombre : "<?php echo $description_place[6] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas : ["<?php echo $latitude[7] ?>", "<?php echo $longitude[7] ?>"], Nombre : "<?php echo $description_place[7] ?>", Icono: "<?php echo $icon_category[12] ?>"},

{Coordenadas: ["<?php echo $latitude[8] ?>", "<?php echo $longitude[8] ?>"], Nombre : "<?php echo $description_place[8] ?>", Icono: "<?php echo $icon_category[2] ?>"},

{Coordenadas: ["<?php echo $latitude[9] ?>", "<?php echo $longitude[9] ?>"], Nombre : "<?php echo $description_place[9] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas: ["<?php echo $latitude[10] ?>", "<?php echo $longitude[10] ?>"], Nombre : "<?php echo $description_place[10] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas: ["<?php echo $latitude[11] ?>", "<?php echo $longitude[11] ?>"], Nombre : "<?php echo $description_place[11] ?>", Icono: "<?php echo $icon_category[0] ?>"},

{Coordenadas: ["<?php echo $latitude[12] ?>", "<?php echo $longitude[12] ?>"], Nombre : "<?php echo $description_place[12] ?>", Icono: "<?php echo $icon_category[2] ?>"},

{Coordenadas: ["<?php echo $latitude[13] ?>", "<?php echo $longitude[13] ?>"], Nombre : "<?php echo $description_place[13] ?>", Icono: "<?php echo $icon_category[11] ?>"},

{Coordenadas: ["<?php echo $latitude[14] ?>", "<?php echo $longitude[14] ?>"], Nombre : "<?php echo $description_place[14] ?>", Icono: "<?php echo $icon_category[2] ?>"},

{Coordenadas: ["<?php echo $latitude[15] ?>", "<?php echo $longitude[15] ?>"], Nombre : "<?php echo $description_place[15] ?>", Icono: "<?php echo $icon_category[3] ?>"},

{Coordenadas: ["<?php echo $latitude[16] ?>", "<?php echo $longitude[16] ?>"], Nombre : "<?php echo $description_place[16] ?>", Icono: "<?php echo $icon_category[4] ?>"},

{Coordenadas: ["<?php echo $latitude[17] ?>", "<?php echo $longitude[17] ?>"], Nombre : "<?php echo $description_place[17] ?>", Icono: "<?php echo $icon_category[3] ?>"},

{Coordenadas: ["<?php echo $latitude[18] ?>", "<?php echo $longitude[18] ?>"], Nombre : "<?php echo $description_place[18] ?>", Icono: "<?php echo $icon_category[5] ?>"},

{Coordenadas: ["<?php echo $latitude[19] ?>", "<?php echo $longitude[19] ?>"], Nombre : "<?php echo $description_place[19] ?>", Icono: "<?php echo $icon_category[5] ?>"},

{Coordenadas: ["<?php echo $latitude[20] ?>", "<?php echo $longitude[20] ?>"], Nombre : "<?php echo $description_place[20] ?>", Icono: "<?php echo $icon_category[6] ?>"},

{Coordenadas: ["<?php echo $latitude[21] ?>", "<?php echo $longitude[21] ?>"], Nombre : "<?php echo $description_place[21] ?>", Icono: "<?php echo $icon_category[6] ?>"},

{Coordenadas: ["<?php echo $latitude[22] ?>", "<?php echo $longitude[22] ?>"], Nombre : "<?php echo $description_place[22] ?>", Icono: "<?php echo $icon_category[7] ?>"},

{Coordenadas: ["<?php echo $latitude[23] ?>", "<?php echo $longitude[23] ?>"], Nombre : "<?php echo $description_place[23] ?>", Icono: "<?php echo $icon_category[7] ?>"},

{Coordenadas: ["<?php echo $latitude[24] ?>", "<?php echo $longitude[24] ?>"], Nombre : "<?php echo $description_place[24] ?>", Icono: "<?php echo $icon_category[9] ?>"},

{Coordenadas: ["<?php echo $latitude[25] ?>", "<?php echo $longitude[25] ?>"], Nombre : "<?php echo $description_place[25] ?>", Icono: "<?php echo $icon_category[8] ?>"},

{Coordenadas: ["<?php echo $latitude[26] ?>", "<?php echo $longitude[26] ?>"], Nombre : "<?php echo $description_place[26] ?>", Icono: "<?php echo $icon_category[13] ?>"},

{Coordenadas: ["<?php echo $latitude[27] ?>", "<?php echo $longitude[27] ?>"], Nombre : "<?php echo $description_place[27] ?>", Icono: "<?php echo $icon_category[0] ?>"},
]
*/

var map = L.map('map').setView([40.41317, -3.68307], 15);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18
}).addTo(map);

L.control.scale().addTo(map);
L.marker([40.39801, -3.83492], { draggable: false }).addTo(map);

L.marker(["<?php echo $latitude[0] ?>", "<?php echo $longitude[0] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[1] ?>", "<?php echo $longitude[1] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[2] ?>", "<?php echo $longitude[2] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[3] ?>", "<?php echo $longitude[3] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[4] ?>", "<?php echo $longitude[4] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[5] ?>", "<?php echo $longitude[5] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[6] ?>", "<?php echo $longitude[6] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[7] ?>", "<?php echo $longitude[7] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[8] ?>", "<?php echo $longitude[8] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[9] ?>", "<?php echo $longitude[9] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[10] ?>", "<?php echo $longitude[10] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[11] ?>", "<?php echo $longitude[11] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[12] ?>", "<?php echo $longitude[12] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[13] ?>", "<?php echo $longitude[13] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[14] ?>", "<?php echo $longitude[14] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[15] ?>", "<?php echo $longitude[15] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[16] ?>", "<?php echo $longitude[16] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[17] ?>", "<?php echo $longitude[17] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[18] ?>", "<?php echo $longitude[18] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[19] ?>", "<?php echo $longitude[19] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[20] ?>", "<?php echo $longitude[20] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[21] ?>", "<?php echo $longitude[21] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[22] ?>", "<?php echo $longitude[22] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[23] ?>", "<?php echo $longitude[23] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[24] ?>", "<?php echo $longitude[24] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[25] ?>", "<?php echo $longitude[25] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[26] ?>", "<?php echo $longitude[26] ?>"], { draggable: false }).addTo(map);
L.marker(["<?php echo $latitude[27] ?>", "<?php echo $longitude[27] ?>"], { draggable: false }).addTo(map);



/*var map = L.map('map').setView([40.39801, -3.83492], 15);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18
}).addTo(map);

L.control.scale().addTo(map);

function DrawMarkers(data){
    L.marker(data.Coordenadas, {
      title: data.Nombre,
      draggable: false,
      opacity: 0.95,
      icon: data.Icono
    }).bindPopup("<i>" + data.Nombre + "</i>")
      .addTo(map);
}

console.log("-------------------------------------------***");
//console.log(locationData1);
for(var key in locationData){
  console.log(locationData[key]);
  DrawMarkers(locationData[key])
}
console.log("-------------------------------------------***");
*/
	
 </script>
 <p><?php echo $image_icon[2] ?></p>

 </body> 
</html>





