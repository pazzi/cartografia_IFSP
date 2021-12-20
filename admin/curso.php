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


 //**** BEGIN GLOBAL VARIABLES ****
 $fcn = 'BNone';
 //**** END GLOBAL VARIABLES ****


 //**** BEGIN GENERIC SQL FUNCTIONS ****

 function listInOrder()
   {
	global $BD2;
   return sql("$BD2","select id, nome from curso order by nome;");
   }


 function lookup($id)
   {
	global $BD2;
   	return sql("$BD2","SELECT * FROM curso where id='$id';");
   }

 function deleteByLastname($id)
   {
	global $BD2;
   return sql("$BD2","DELETE FROM curso where id='$id';");
   }

 //**** END GENERIC SQL FUNCTIONS ****


 //**** BEGIN HIGH LEVEL APP UTILITY FUNCTIONS ****

 function presentInputForm($id, $nome, $categoria, $nivel, $fic, $eja, $duracao, $fcnLetter)
    {
	global $SISTEMA_NOME;
   switch ($fcnLetter)
     {
     case "E":
     case "A":
       break;
     default: 
       echo "<p><h1>Letra de funcao ilegal ($fcnLetter) in presentInputForm()<p>\n";
  echo "<p><a href=\"curso.php\">Volte para selecionar </a>";
return;
       break;
     }

   echo "<font class=corpo><b>$SISTEMA_NOME - Cursos </b></font> <br><br>";
   echo "<form action=\"curso.php\" method=\"POST\">\n";

   echo "<p><b> Código:</b> ";
   switch ($fcnLetter)
     {
     case "E":                   //don't allow editing of key value
       echo "$id<br>\n";
       echo "<input type=\"hidden\" name=\"HILid\" value=\"$id\">\n<br><br><br>";
       break;
     }
   echo "<br>Nome: ";
   echo "<input type=\"text\" name=\"TInome\" value=\"$nome\" size=61 maxlength=60>\n<br>";

   echo "<br>Categoria: ";
   echo "<input type=\"text\" name=\"TIcategoria\" value=\"$categoria\" size=11 maxlength=10>\n<br>";

   echo "<br>Nível: ";
   echo "<input type=\"text\" name=\"TInivel\" value=\"$nivel\" size=21 maxlength=20>\n<br>";

   echo "<br>FIC: ";
   echo "<input type=\"text\" name=\"TIfic\" value=\"$fic\" size=21 maxlength=20>\n<br>";


   echo "<br>EJA: ";
   echo "<input type=\"text\" name=\"TIeja\" value=\"$eja\" size=21 maxlength=20>\n<br>";

   echo "<br>Duracao: ";
   echo "<input type=\"text\" name=\"TIduracao\" value=\"$duracao\" size=21 maxlength=20>\n<br>";

   //**** PLACE FUNCTION LETTER IN BUTTON NAMES TO CONVEY STATE ****
   echo "<p><input type=\"submit\" name=\"B" . $fcnLetter;
   echo "Submit\" value=\"Submit\">\n";
   echo "&nbsp;&nbsp;\n";

   echo "<input type=\"submit\" name=\"B" . $fcnLetter;
   echo "Cancel\" value=\"Cancel\">\n";
   echo "</form>\n";

   }

 function fillSelect()
   {
	global $SISTEMA_NOME;
   $result=listInOrder(); //THIS REPLACES FORMER INLINE pg_ CALLS!

   echo "<form  action=\"curso.php\" method=\"POST\">\n";
   echo  "<font class=title> $SISTEMA_NOME - Cursos do IFSP</font> <br><br>";
   echo "<select name=\"DROWS\" size=\"1\">\n";
   echo "<pre>";
   while ($row = $result->fetch_assoc())
   {
	  echo "<option value=". $row["id"].">";
	  echo $row["nome"];
	  echo "</option>\n";
    }
   echo "</pre>";
   echo "</select></font>\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"BEdit\" value=\"Edit\">\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"BAdd\" value=\"Add\">\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"BDelete\" value=\"Delete\">\n";
   echo "</form>\n";
   }

 function setGlobals()
   {
   global $_POST;
   if(sizeof($_POST) < 1)
     {
     return;
     }
   global $fcn;
   reset ($_POST);
   while (list ($key, $val) = each ($_POST)) 
     {
     if(substr($key, 0, 1) == 'B') //Only buttons begin with B
       {
       $fcn=$key;
       }
     }
   }

 //**** END HIGH LEVEL APP UTILITY FUNCTIONS ****


 //**** BEGIN STATE-SPECIFIC SUBROUTINES ****

 function doEdit()
   {
   	global $_POST;
  	if (strlen($_POST["DROWS"]) <= 0)
    		{
     			echo "Nao existe valores a serem editados";
     			echo "<a href=./curso.php>Voltar</a> ";
     			exit();
    		}
	$result = lookup($_POST["DROWS"]);

	while ($row = $result->fetch_row()) {
		$id=$row[0];
	       	$nome=$row[1];
	       	$categoria=$row[2];
	       	$nivel=$row[3];
	       	$fic=$row[4];
	       	$eja=$row[5];
	       	$duracao=$row[6];
    }

   	presentInputForm($id, $nome, $categoria,$nivel, $fic, $eja, $duracao, "E");
   }

 function doAdd()
   {
   global $_POST;
   presentInputForm("","","","","","","","A");
   }

 function doDelete()
   {
   global $_POST;
$regs=explode(":::",$_POST["DROWS"]);
$id= $regs[0];
  $result=lookup($id);
   for($column=0; $column < mysql_num_fields($result); $column++)
     {
     echo mysql_field_name($result, $column) . "=";
     echo mysql_result ($result, 0, $column) . "<br>\n";
     }
   echo "<form  action=\"curso.php\" method=\"POST\">\n";
   echo "<input type=\"hidden\" name=\"HDid\" value=\"$id\">\n";
      
   echo "<input type=\"submit\" name=\"BDDelete\" value=\"Delete\">\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"BDCancel\" value=\"Cancel\">\n";
   echo "&nbsp;&nbsp;\n";
   echo "</form>\n";
   }

 function doGeneric()
   {
   fillSelect();
   }

 function editToDB()
   {
   global $_POST;
   global $BD2;
   $statement = "UPDATE curso ";
   $statement .= "SET nome='" . chop($_POST["TInome"]);
   $statement .= "', categoria='" . chop($_POST["TIcategoria"]);
   $statement .= "', nivel='" . chop($_POST["TIinivel"]);
   $statement .= "', fic='" . chop($_POST["TIfic"]);
   $statement .= "', eja='" . chop($_POST["TIeja"]);
   $statement .= "', duracao='" . chop($_POST["TIduracao"]);
   $statement .= "' WHERE id='" . chop($_POST["HILid"]);
   $statement .= "';";
   sql("$BD2",$statement);
   }

 function addToDB()
   {
   global $BD2;
   global $_POST;
   $statement = "INSERT INTO curso VALUES (\"null\" ,";
   $statement .= "'" . $_POST["TInome"] . "',";
   $statement .= "'" . $_POST["TIcategoria"] . "',";
   $statement .= "'" . $_POST["TInivel"] . "',";
   $statement .= "'" . $_POST["TIfic"] . "',";
   $statement .= "'" . $_POST["TIeja"] . "',";
   $statement .= "'" . $_POST["TIduracao"] . "'";
   $statement .= ");";
   sql("$BD2",$statement);
}
 function deleteFromDB()
   {
	global $BD2;
	global $_POST;
	$id= $_POST["HDid"];
	sql("$BD2","DELETE FROM curso where id='$id';");
   }

 //**** END STATE-SPECIFIC SUBROUTINES ****


 //**** BEGIN MAIN PROGRAM ****
// header('<META HTTP-EQUIV="pragma" CONTENT="nocache">'); 
 setGlobals();
cabecalho();
 switch ($fcn)
   {
   case "BEdit":
     doEdit();
     break;
   case "BAdd":
     doAdd();
     break;
   case "BDelete":
     doDelete();
     break;
   case "BESubmit":
     editToDB();
     doGeneric();
     break;
   case "BASubmit":
     addToDB();
     doGeneric();
     break;
   case "BDDelete":
     deleteFromDB();
     doGeneric();
     break;
   case "BACancel":
   case "BDCancel":
   case "BECancel":
   case "BNone":
     doGeneric();
     break;
   default:
     echo "Illegal function identifier encountered:$fcn:<p>\n";
     break;
   }
echo "<br>";
echo "<br>";
echo "<center><a href=./repres.php3><font class=corpo>Sair</font></a>";
echo "<br>";
echo "<br>";
echo "<br>";
rodape();

 //**** END MAIN PROGRAM ****
?>
