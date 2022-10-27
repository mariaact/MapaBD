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


var map = L.map('map').setView([40.41317, -3.68307], 15);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18
}).addTo(map);

L.control.scale().addTo(map);
L.marker([40.39801, -3.83492], { draggable: false }).addTo(map);



L.marker(["<?php echo $latitude[0] ?>", "<?php echo $longitude[0] ?>"], {
  title: "Museo del prado",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[0] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[1] ?>", "<?php echo $longitude[1] ?>"], {
  title: "Museo Tyssen",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[1] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[2] ?>", "<?php echo $longitude[2] ?>"], {
  title: "Caixa Forum",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[2] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[3] ?>", "<?php echo $longitude[3] ?>"], {
  title: "Museo Reina Sofia",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[3] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[4] ?>", "<?php echo $longitude[4] ?>"], {
  title: "Teatro Real",
  draggable: false,
  opacity: 0.95,
  icon: IconoCine
}).bindPopup("<?php echo $description_place[4] ?>")
  .addTo(map);
 
L.marker(["<?php echo $latitude[5] ?>", "<?php echo $longitude[5] ?>"], {
  title: "Jardines de Sabatinni",
  draggable: false,
  opacity: 0.95,
  icon: IconoVerde
}).bindPopup("<?php echo $description_place[5] ?>")
  .addTo(map); 
  
L.marker(["<?php echo $latitude[6] ?>", "<?php echo $longitude[6] ?>"], {
  title: "Palacio Real",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[6] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[7] ?>", "<?php echo $longitude[7] ?>"], {
  title: "Catedral de la Almudena",
  draggable: false,
  opacity: 0.95,
  icon: IconoIglesia
}).bindPopup("<?php echo $description_place[7] ?>")
  .addTo(map); 
  
L.marker(["<?php echo $latitude[8] ?>", "<?php echo $longitude[8] ?>"], {
  title: "Parque del Retiro",
  draggable: false,
  opacity: 0.95,
  icon: IconoVerde
}).bindPopup("<?php echo $description_place[8] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[9] ?>", "<?php echo $longitude[9] ?>"], {
  title: "Puerta de Alcala",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[9] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[10] ?>", "<?php echo $longitude[10] ?>"], {
  title: "Plaza Mayor",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[10] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[11] ?>", "<?php echo $longitude[11] ?>"], {
  title: "Museo Sorolla",
  draggable: false,
  opacity: 0.95,
  icon: IconoMonumento
}).bindPopup("<?php echo $description_place[11] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[12] ?>", "<?php echo $longitude[12] ?>"], {
  title: "Santiago Bernabeu",
  draggable: false,
  opacity: 0.95,
  icon: IconoDeportes
}).bindPopup("<?php echo $description_place[12] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[13] ?>", "<?php echo $longitude[13] ?>"], {
  title: "Las cuatro torres",
  draggable: false,
  opacity: 0.95,
  icon: IconoEmpresa
}).bindPopup("<?php echo $description_place[13] ?>")
  .addTo(map);   
  
L.marker(["<?php echo $latitude[14] ?>", "<?php echo $longitude[14] ?>"], {
  title: "Metropolitano",
  draggable: false,
  opacity: 0.95,
  icon: IconoDeportes
}).bindPopup("<?php echo $description_place[14] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[15] ?>", "<?php echo $longitude[15] ?>"], {
  title: "Warnner",
  draggable: false,
  opacity: 0.95,
  icon: IconoParqueAtracciones
}).bindPopup("<?php echo $description_place[15] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[16] ?>", "<?php echo $longitude[16] ?>"], {
  title: "ABC Serrano",
  draggable: false,
  opacity: 0.95,
  icon: IconoWifi
}).bindPopup("<?php echo $description_place[16] ?>")
  .addTo(map);   

L.marker(["<?php echo $latitude[17] ?>", "<?php echo $longitude[17] ?>"], {
  title: "Parque de atracciones de Madrid",
  draggable: false,
  opacity: 0.95,
  icon: IconoParqueAtracciones
}).bindPopup("<?php echo $description_place[17] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[18] ?>", "<?php echo $longitude[18] ?>"], {
  title: "Wizink Center",
  draggable: false,
  opacity: 0.95,
  icon: IconoMusica
}).bindPopup("<?php echo $description_place[18] ?>")
  .addTo(map);    
  
L.marker(["<?php echo $latitude[19] ?>", "<?php echo $longitude[19] ?>"], {
  title: "Vista alegre",
  draggable: false,
  opacity: 0.95,
  icon: IconoMusica
}).bindPopup("<?php echo $description_place[19] ?>")
  .addTo(map); 
 
L.marker(["<?php echo $latitude[20] ?>", "<?php echo $longitude[20] ?>"], {
  title: "Ojala Bar",
  draggable: false,
  opacity: 0.95,
  icon: IconoBar
}).bindPopup("<?php echo $description_place[20] ?>")
  .addTo(map);  

L.marker(["<?php echo $latitude[21] ?>", "<?php echo $longitude[21] ?>"], {
  title: "Cherry Pecas",
  draggable: false,
  opacity: 0.95,
  icon: IconoBar
}).bindPopup("<?php echo $description_place[21] ?>")
  .addTo(map); 
 
L.marker(["<?php echo $latitude[22] ?>", "<?php echo $longitude[22] ?>"], {
  title: "Oven",
  draggable: false,
  opacity: 0.95,
  icon: IconoComida
}).bindPopup("<?php echo $description_place[22] ?>")
  .addTo(map);    
  
L.marker(["<?php echo $latitude[23] ?>", "<?php echo $longitude[23] ?>"], {
  title: "SteackBurguer",
  draggable: false,
  opacity: 0.95,
  icon: IconoComida
}).bindPopup("<?php echo $description_place[23] ?>")
  .addTo(map);
  
L.marker(["<?php echo $latitude[24] ?>", "<?php echo $longitude[24] ?>"], {
  title: "Banco de España",
  draggable: false,
  opacity: 0.95,
  icon: IconoBancos
}).bindPopup("<?php echo $description_place[24] ?>")
  .addTo(map);  
  
L.marker(["<?php echo $latitude[25] ?>", "<?php echo $longitude[25] ?>"], {
  title: "H Gregorio",
  draggable: false,
  opacity: 0.95,
  icon: IconoFarmacias
}).bindPopup("<?php echo $description_place[25] ?>")
  .addTo(map); 
  
L.marker(["<?php echo $latitude[26] ?>", "<?php echo $longitude[26] ?>"], {
  title: "CArrefour",
  draggable: false,
  opacity: 0.95,
  icon: IconoSuper
}).bindPopup("<?php echo $description_place[26] ?>")
  .addTo(map); 

	
 </script>
 <p><?php echo $image_icon[2] ?></p>

 </body> 
</html>





