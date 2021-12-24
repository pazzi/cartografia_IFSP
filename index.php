<!DOCTYPE html>
<html>
<head>
<title>IFSP - Cartografia</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="custom.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
<?php
require("funcoes.php");
#$id=$_POST['optradio'];
$conn=conectar();
?>

<div class="cabecalho">
<div class="p-2 bg-success bg-gradient text-white text-center">
  <h1>Cartografia - IFSP</h1>
  <p>Dados do IFSP</p> 
</div>
</div>

<div class="container">
  <!--div class="row justify-content-start"-->
  <div class="row">
    <div class="col-sm-8">
      <!--h5>  </h5-->
	<div id="map" style="width: 790px; height: 560px;"></div>
      <!--h3 class="mt-4">Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <hr class="d-sm-none"-->
    </div>

    <div class="col-sm-4">
      <h5>Cursos:</h5>

	<form action="index.php" method="POST">
	<input type="hidden" name="flag" value="1">
<?php marca_fic()?>
	<div class="row">
		<div class="d-grid gap-2 col-6 mx-auto">
  			<button class="btn btn-primary" type="submit">Enviar</button>
		</div>
  	</div>
	</form>

<?php 
$texto=isset($texto)? $texto: '';
echo $texto
?>

      <!--h2 class="mt-5">TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2020</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
</div-->


<?php
$flag=isset($_POST['flag'])? $_POST['flag']: '';
if ($flag && ver_retorno_curso())
{
	$id=ver_retorno_curso();
	$result_markers = busca_marcadores_por_curso($id);
	$texto ="<p>Campus do IFSP que possuem o curso ".busca_nome_curso($id).":</p>";
}
else{
	$result_markers=busca_marcadores();
	$texto ="<p>Campus do IFSP  no estado de São Paulo:</p>";
}
$conn=conectar();
$result = mysqli_query($conn, $result_markers);
$conn->close();
?>

<script>
	var mymap = L.map('map').setView([-22.49, -48.70], 7);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

<?php icon_color("icon_yel")?>
<?php $tipo="icon_yel"?>

<?php
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
	    $texto .= $row['name'].", ";
?>

	L.marker([<?php echo $row['lat']?>, <?php echo $row['lng']?>], {icon: <?php echo $tipo ."Icon"?>}).addTo(mymap)
		.bindPopup("<?php echo "<b>Campus ".$row['name']. "</b><br>"; echo $row['address']?>");
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

<?php echo substr($texto, 0, -2)."."?>
    </div>
  </div>
</div>

</body>
</html>
