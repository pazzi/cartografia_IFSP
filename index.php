<!DOCTYPE html>
<html>
<head>
<title>IFSP - Cartografia</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
<?php
require("funcoes.php");
$id=$_POST['optradio'];
?>

<div class="container mt-3">
  <h1 class="text-center">IFSP - Cartografia</h1>
  <p class="text-center">Consultas</p>
</div>

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-8">
			<div id="map" style="width: 900px; height: 600px;"></div>
			<!--div id="map" style="width: 600px; height: 400px;"></div-->
		</div>
	</div>
	<form action="index.php" method="POST">
	<div class="row">

<?php
$result_cursos = "SELECT id, nome FROM curso where tipo='T' order by nome";  
$resultT = mysqli_query($conn, $result_cursos);
$result_cursos = "SELECT id, nome FROM curso where tipo='L' order by nome";  
$resultL = mysqli_query($conn, $result_cursos);
$result_cursos = "SELECT id, nome FROM curso where tipo='B' order by nome";  
$resultB = mysqli_query($conn, $result_cursos);
?>

		<div class="col-sm-4">
		<h4>Cursos de Tecnologia</h4>
<?php    while($rowT = mysqli_fetch_assoc($resultT)) {
		?>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio<?php echo $rowT['id']?>" name="optradio" value="<?php echo $rowT['id']?>"> 
				<label class="form-check-label" for="radio<?php echo $rowT['id']?>"> <?php echo $rowT['nome'] ?> </label>
			</div>
<?php }?>
		</div>
		<div class="col-sm-4">
		<h4>Cursos de Licenciatura</h4>
<?php while($rowL = mysqli_fetch_assoc($resultL)) {
?>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio<?php echo $rowL['id']?>" name="optradio" value="<?php echo $rowL['id']?>"> 
				<label class="form-check-label" for="radio<?php echo $rowL['id']?>"> <?php echo $rowL['nome'] ?> </label>
			</div>
<?php }?>
  		</div>
		<div class="col-sm-4">
		<h4>Cursos de Bacharelado</h4>
<?php   while($rowB = mysqli_fetch_assoc($resultB)) {
?>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio<?php echo $rowB['id']?>" name="optradio" value="<?php echo $rowB['id']?>"> 
				<label class="form-check-label" for="radio<?php echo $rowB['id']?>"> <?php echo $rowB['nome'] ?> </label>
			</div>
<?php }?>
    	
  		</div>
	<div class="row">
		<div class="col-sm-4"> </div>
		<div class="col-sm-4">
		<button type="submit" class="btn btn-outline-info">Enviar</button>
		</div>
		<div class="col-sm-4"></div>
	</form>
</div>


<?php
// Select all the rows in the markers table
if ($_POST['optradio'])
{
$result_markers = "SELECT markers.* FROM markers,tab_curso WHERE tab_curso.id_curso='".$_POST['optradio']."' AND markers.id=tab_curso.id_cidade";  
}
else{
$result_markers = "SELECT * FROM markers";
}
$result = mysqli_query($conn, $result_markers);
$conn->close();
?>

<script>

	var mymap = L.map('map').setView([-22.49, -47.70], 7);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

<?php


if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>

		L.marker([<?php echo $row['lat']?>, <?php echo $row['lng']?>]).addTo(mymap)
		.bindPopup("<?php echo $row['address']?>");
<?php
    }
} else {
    echo "0 results";
}
?>


	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("Latitude e longitude do local: " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script>
</body>
</html>
