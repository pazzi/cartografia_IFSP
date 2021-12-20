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


echo "<br>\n";

 //**** BEGIN GLOBAL VARIABLES ****
 $fcn = BNone;
 //**** END GLOBAL VARIABLES ****


 //**** BEGIN GENERIC SQL FUNCTIONS ****

 function listInOrder()
   {
	global $BD2;
   return sql("$BD2","select id, name from markers order by name;");
   }


 function lookup($id)
   {
	global $BD2;
   	return sql("$BD2","SELECT * FROM markers where id='$id';");
   }

 function deleteByLastname($id)
   {
	global $BD2;
   return sql("$BD2","DELETE FROM markers where id='$id';");
   }

 //**** END GENERIC SQL FUNCTIONS ****


 //**** BEGIN HIGH LEVEL APP UTILITY FUNCTIONS ****

 function presentInputForm($id, $name, $address, $lat, $lng, $type, $fcnLetter)
    {
	global $SISTEMA_NOME;
   switch ($fcnLetter)
     {
     case "E":
     case "A":
       break;
     default: 
       echo "<p><h1>Letra de funcao ilegal ($fcnLetter) in presentInputForm()<p>\n";
  echo "<p><a href=\"campus.php\">Volte para selecionar </a>";
return;
       break;
     }

   echo "<b>$SISTEMA_NOME - Cadastramento de Campus</b>";
   echo "<form action=\"campus.php\" method=\"POST\">\n";
   echo "<p>Codigo:";
   switch ($fcnLetter)
     {
     case "E":                   //don't allow editing of key value
       echo "$id";
       echo "<input type=\"hidden\" name=\"HILid\" value=\"$id\">\n";
       break;
     }
   echo "</p>";
   echo "<div class=\"formulario\">";
   echo "Nome: ";
   echo "<input type=\"text\" name=\"TIname\" value=\"$name\" size=61 maxlength=60>";
   echo "</div>\n";	

   echo "<div class=\"formulario\">";
   echo "Endereço: ";
   echo "<input type=\"text\" name=\"TIaddress\" value=\"$address\" size=121 maxlength=120>";
   echo "</div\n>";	

   echo "<div class=\"formulario\">";
   echo "Latitude: ";
   echo "<input type=\"text\" name=\"TIlat\" value=\"$lat\" size=21 maxlength=20>";
   echo "</div>\n";	

   echo "<div class=\"formulario\">";
   echo "Longitude: ";
   echo "<input type=\"text\" name=\"TIlng\" value=\"$lng\" size=21 maxlength=20>";
   echo "</div>\n";	

   echo "<div class=\"formulario\">";
   echo "Tipo: ";
   echo "<input type=\"text\" name=\"TItype\" value=\"$type\" size=31 maxlength=30>";
   echo "</div>\n";	

   echo "<div class=\"formulario\">";
   echo "<input type=\"submit\" name=\"B" . $fcnLetter. "Submit\" value=\"Submit\">\n";
   echo "&nbsp;&nbsp;\n";
   echo "<input type=\"submit\" name=\"B" . $fcnLetter. "Cancel\" value=\"Cancel\">\n";
   echo "</div>\n";	
   echo "</form>\n";

   }

 function fillSelect()
   {
	global $SISTEMA_NOME;
   $result=listInOrder(); //THIS REPLACES FORMER INLINE pg_ CALLS!

   echo "<form  action=\"campus.php\" method=\"POST\">\n";
   echo  "<font class=title> $SISTEMA_NOME - Campus do IFSP</font> <br><br>";
   echo "<select name=\"DROWS\" size=\"1\">\n";
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
	$regs=explode(":::",$_POST["DROWS"]);
	$id= $regs[0];
  	if (strlen($id) <= 0)
    		{
     			echo "Nao existe valores a serem editados";
     			echo "<a href=./campus.php>Voltar</a> ";
     			exit();
    		}
	$result = lookup($id);

	while ($row = $result->fetch_row()) {
		$id=$row[0];
	       	$name=$row[1];
	       	$address=$row[2];
	       	$lat=$row[3];
	       	$lng=$row[4];
	       	$type=$row[5];
    }

   	presentInputForm($id, $name, $address, $lat, $lng, $type, "E");
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
   echo "<form  action=\"campus.php\" method=\"POST\">\n";
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
   $statement = "UPDATE markers ";
   $statement .= "SET name='" . chop($_POST["TIname"]);
   $statement .= "', address='" . chop($_POST["TIaddress"]);
   $statement .= "', lat='" . chop($_POST["TIlat"]);
   $statement .= "', lng='" . chop($_POST["TIlng"]);
   $statement .= "', type='" . chop($_POST["TItype"]);
   $statement .= "' WHERE id='" . chop($_POST["HILid"]);
   $statement .= "';";
   sql("$BD2",$statement);
   }

 function addToDB()
   {
   global $BD2;
   global $_POST;
   $statement = "INSERT INTO markers VALUES (\"null\" ,";
   $statement .= "'" . $_POST["TIname"] . "',";
   $statement .= "'" . $_POST["TIaddess"] . "',";
   $statement .= "'" . $_POST["TIlat"] . "',";
   $statement .= "'" . $_POST["TIlng"] . "',";
   $statement .= "'" . $_POST["TItype"] . "'";
   $statement .= ");";
   sql("$BD2",$statement);
}
 function deleteFromDB()
   {
	global $BD2;
	global $_POST;
	$id= $_POST["HDid"];
	sql("$BD2","DELETE FROM markers where id='$id';");
   }

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
rodape();
?>
