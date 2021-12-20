<?php
$BD2="map";
$SISTEMA_NOME="Cartografia Digital";
$CAMINHO="maps/leaf2/v1/admin/admSist"; 

function cabecalho()
{
global $CAMINHO;

echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
echo "
	<title>Cartografia Digital</title>
	<meta charset=\"UTF-8\">
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
	</head>
	<body>";
}

function rodape()
{
	echo "<div class=\"mt-5 p-4 bg-dark text-white text-center\">";
	echo "<p>Projeto de Extensão: Base Cartográfica Digital do IFSP  IFSP-<b>Campus Capivari, SP</b></p>\n";
	echo "</div>";
	echo "</body>\n";
	echo "</html>\n";
}

function conectar(){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "tpw100";
	$dbname = "map";
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	return $conn;
}

function ver_retorno_curso(){
$sql_str="SELECT count(id) as total from fic";
$result=sql("map",$sql_str);
	while($row = mysqli_fetch_assoc($result)) {
		$total=$row['total'];
	}
		for ($i=1; $i <= $total; $i++)
		{
			if ($_POST["opcaoL$i"] > 0)
			{
				return $_POST["opcaoL$i"];
			}
		}
		return 0;
}

function sql($db,$command)
   {
   $connection = mysqli_connect ('localhost', 'root', 'tpw100', $db);
    if ($connection -> connect_errno)
     {
        print "Failed to open database!<br>\n";
        return 0;
        exit();
     }
   $result = mysqli_query($connection, $command);
   mysqli_close($connection);
   return $result;
   exit();
   }

function busca_marcadores_por_curso($cod_curso){
	 $result_markers = "SELECT markers.* FROM markers,tab_curso WHERE tab_curso.id_curso='".$cod_curso."' AND markers.id=tab_curso.id_cidade ORDER BY markers.name";
	 return $result_markers;
}

function busca_marcadores(){
	 $result_markers = "SELECT * FROM markers ORDER BY name";
	 return $result_markers;
}

function busca_nome_curso($cod_curso){
	$txt_sql = "SELECT nome FROM curso WHERE id='".$cod_curso. "'";
	$conn=conectar();
	$result = mysqli_query($conn, $txt_sql);
	while($row_curso=$result->fetch_array()){
		$nome_curso = $row_curso['nome'];
	}
	$conn->close();
	return $nome_curso;
}

function nome_campus($id){
	$txt_sql = "SELECT name FROM markers WHERE id='".$id. "'";
	$conn=conectar();
	$result = mysqli_query($conn, $txt_sql);
	while($row_c=$result->fetch_array()){
		$nome_c = $row_c['name'];
	}
	$conn->close();
	return $nome_c;
}


function busca_curso_por_fic($id){
	$sql_str="SELECT * FROM curso where fic='".$id."'";
	$result=sql("map", $sql_str);
	return $result;
}

function marca_fic(){
	$sql_str="SELECT * FROM fic";
	$result=sql("map",$sql_str);
	while($row = mysqli_fetch_assoc($result)) {
	echo "<div class=\"row\">\n";
	echo "<select name=\"opcaoL".$row['id'] ."\">\n";
                                //echo "<option value=\"FIC_".$row['id']."\">". $row['descricao']. "</option>\n"; 
                                echo "<option value=\"0\">". $row['descricao']. "</option>\n"; 
				$resultc=busca_curso_por_fic($row['id']);
					while($rowc = mysqli_fetch_assoc($resultc)) {
                                		echo "<option value=\"".$rowc['id']."\">". $rowc['nome']. "</option>\n"; 
					}
	echo "</select>\n";
	echo "</div>";
	}
}

function icon_color($tipo)
{
echo "var ".$tipo. "Icon = new L.Icon({\n";
echo "iconUrl: './icons/". $tipo.".png',\n";                                                                                 
#echo "shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',\n";  
echo "shadowUrl: './icons/marker-shadow.png',\n";  
echo "iconSize: [25, 41],\n"; 
echo "conAnchor: [12, 41],\n"; 
echo "popupAnchor: [1, -34],\n"; 
echo "shadowSize: [41, 41]\n"; 
echo "});\n";
}

function marca_ponto_campus($lat, $lng, $tipo, $campus, $endereco){
	echo "\n\n";
	echo "L.marker([". $lat . "," . $lng."], {icon:". $tipo ."Icon}).addTo(mymap)\n";   
	echo "	.bindPopup('<b>Campus: ".$campus. "</b><br>". $endereco."');\n";
}
?>
