<?php
include ("../funcoes.php");
global $SISTEMA_NOME;

/*
$ip=$REMOTE_ADDR;
if (verificaUser($cookie_user, $cookie_stamp, $ip, "be")!=1)
{
header("Location:http://$HTTP_HOST/$VAR_SEG/main.php3");
exit();
}
*/

cabecalho();

 function listar()
   {
	global $BD2;
	return sql("$BD2","select m.name, c.nome,c.categoria, c.nivel, c.eja, f.descricao 
		FROM markers m, curso c, tab_curso t, fic f 
		WHERE m.id=t.id_cidade 
		AND c.id=t.id_curso 
		AND f.id=c.fic 
		ORDER BY m.name, f.descricao, c.nome;");
   }


echo "<div class=\"container mt-5\">";
echo "<div class=\"row\">";
echo "<div class=\"col-sm-12\">";
$result_list=listar($_POST["DROWS"]);
echo "<table class=\"table table-striped\">";
echo "<th>Campus</th><th>Curso</th><th>FIC</th><th>Categoria</th><th>Nível</th>";
   while ($row = $result_list->fetch_assoc())
   {
	   echo  "<tr><td>". $row["name"]."</td><td>". $row["nome"]. "</td><td> ". $row["descricao"]."</td><td>". $row["categoria"]. "</td><td>". $row["nivel"]."</td></tr>";
    }
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";

rodape();

 //**** END MAIN PROGRAM ****
?>
