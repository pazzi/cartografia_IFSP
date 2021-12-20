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

 function listCursos()
   {
	global $BD2;
   return sql("$BD2","select id, nome from curso order by nome;");
   }

 function listCampusCursos($id)
   {
	global $BD2;
	return sql("$BD2","select m.name, c.nome, f.descricao from markers m, curso c, tab_curso t, fic f 
		WHERE m.id=t.id_cidade 
		AND c.id=t.id_curso 
		AND f.id=c.fic 
		AND t.id_cidade='$id' 
		ORDER BY f.descricao, c.nome;");
   }


 function listInOrder()
   {
	global $BD2;
   return sql("$BD2","select id, name from markers order by name;");
   }


 function fillSelect()
   {
	global $SISTEMA_NOME;
   $result=listInOrder(); //THIS REPLACES FORMER INLINE pg_ CALLS!

   echo "<form  action=\"campus_cursos.php\" method=\"POST\">\n";
   echo  "<font class=title> $SISTEMA_NOME - Campus do IFSP</font> <br><br>";
   echo "<select class=\"p-1\" name=\"DROWS\" size=\"1\">\n";
   echo "<pre>";
   while ($row = $result->fetch_assoc())
   {
	   echo "<option value=". $row["id"].">";
	  	echo $row["name"];
	   echo "</option>";
    }
   echo "</pre>";
   echo "</select></font>\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"BEscolher\" value=\"Escolher\">\n";
   echo "</form>\n";
   }

if(!$_POST["DROWS"])
{
fillSelect();
}else{
	if ($_POST["BAdd"] OR $_POST["BRem"])
	{
		$id=ver_retorno_curso();
		if ($id != 0)
		{
			if($_POST["BAdd"]){
				$str_sql="insert into tab_curso(id_cidade, id_curso) values(".$_POST["DROWS"].",".$id.")";
			}else{
				$str_sql="delete FROM tab_curso where id_cidade=".$_POST["DROWS"]. "  and id_curso=".$id;
			}
			sql($BD2, $str_sql);
		}
		else{
			echo "Selecione uma opcao";
		}
	}

	echo "<div class=\"container mt-5\">";
	echo "<div class=\"row\">";
	echo "<div class=\"col-sm-8\">";
	$result_list=listCampusCursos($_POST["DROWS"]);
	echo "<h3>Campus: ".nome_campus($_POST["DROWS"])."</h3>";
	echo "<table class=\"table table-Light\">";
	while ($row = $result_list->fetch_assoc())
	   {
		   echo  "<tr>\n<td>". $row["nome"]. "\n</td><td> ". $row["descricao"]."</td>\n</tr>";
	    }
	echo "</table>";
	echo "</div>";

	echo "<div class=\"col-sm-4\">";
	echo "<form action=\"campus_cursos.php\" method=\"POST\">";
	echo "<input type=\"hidden\" value=\"".$_POST["DROWS"]. "\" name=\"DROWS\">";
	marca_fic();
	echo "<input type=\"submit\" class=\"btn btn-primary m-3\" name=\"BAdd\" value=\"Adicionar\">\n";
	echo "<input type=\"submit\" class=\"btn btn-danger m-3\" name=\"BRem\" value=\"Remover\">\n";
	echo "</form>";
	echo "</div>";
	echo "</div>";
}
rodape();

 //**** END MAIN PROGRAM ****
?>
