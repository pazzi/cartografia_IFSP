<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "tpw100";
	$dbname = "map";
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

function verCursos(){
	$result_cursos = "SELECT id, nome FROM curso";  
	$result = mysqli_query($conn, $result_cursos);
	return($result);
}
?>
