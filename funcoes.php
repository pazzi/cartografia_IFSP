<?php
$BD2="map";
$SISTEMA_NOME="Cartografia Digital";
$CAMINHO="maps/leaf2/v1/admin/admSist"; 
$RESP_NDI_EMAIL="";
#Verificar o id correspondente ao papel  "ponto focal" em rep_papel
$PONTO_FOCAL_ID=13;

function cabecalho()
{
global $CAMINHO;

echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
echo "
	<title></title>
	<meta charset=\"ISO-8859-1\">
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
	</head>
	<body>";
}


function cabecalho_simples()
{
global $CAMINHO;
echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
echo "
    <meta charset=\"ISO-8859-1\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title></title>

    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/intranet/nosso_ambiente/admin/adm_repres/public/css/bootstrap.min.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/intranet/nosso_ambiente/admin/adm_repres/public/css/metisMenu.min.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/intranet/nosso_ambiente/admin/adm_repres/public/css/sb-admin-2.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/intranet/nosso_ambiente/admin/adm_repres/public/css/font-awesome.min.css\">
</head>
<body>";
echo "<nav class=\"navbar navbar-inverse\">\n";
echo "<div class=\"container-fluid\">\n";
echo "<div class=\"navbar-header\">\n";
echo "<a class=\"navbar-brand\" href=\"http://localhost/".$CAMINHO."/consultas/publico.php\">R E P R E S E N T A C O E S &nbsp;&nbsp;    I N S T I T U C I O N A I S</a>";
echo "  </div>\n";
echo "    <ul class=\"nav navbar-nav\">\n";
echo "      <li><a href=\"http://localhost/".$CAMINHO."/relato/relato_login.php?ano_base=".date(Y)."\">Relato-Login</a></li>\n";
echo "      <li><a href=\"http://localhost/".$CAMINHO."/pub_referencias.php\">Sobre</a></li>\n";
echo "    </ul>\n";
echo "  </div>\n";
echo "</nav>\n";

}

function cabecalho_publico()
{

echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";

echo "<head>";
echo "
    <meta charset=\"ISO-8859-1\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title></title>

    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/".$CAMINHO."/public/css/bootstrap.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/".$CAMINHO."/public/css/metisMenu.min.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/".$CAMINHO."/public/css/sb-admin-2.css\">
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"/".$CAMINHO."/public/css/font-awesome.min.css\">
</head>
<body>";
echo "<nav class=\"navbar navbar-inverse\">";
echo "<div class=\"container-fluid\">";
echo "<div class=\"navbar-header\">";
echo "<a class=\"navbar-brand\" href=\"http://localhost/".$CAMINHO."/repres.php\">C A R T O G R A F I A  &nbsp;&nbsp;    D I G I T A L</a>";
echo "  </div>";
echo "    <ul class=\"nav navbar-nav\">";
echo "      <li><a href=\"http://localhost/".$CAMINHO."/pub_referencias.php\">Sobre</a></li>";
echo "    </ul>";
echo "</nav>";

}

function rodape()
{

echo "<br>\n";
echo "<br>\n";
echo "<center>\n";

echo "<table>\n";
echo "<tr>\n";
echo "<td WIDTH=\"100%\" HEIGHT=\"16\" align=\"center\"><font class=\"tiny\">Copyright © &nbsp;2021-".date('Y')." IFSP<br> <b>Campus Capivari, SP</b></font>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</center>\n";



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
