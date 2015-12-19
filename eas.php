<?php
session_start(); 
include"auth.php";

$mess = '';
include("sett.php");
if(isset($_POST['step']) && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0"; } 
if(isset($_POST['name']) && $_POST['name'] != ''){ $step = '1'; }else{ $step = "0";if(isset($_POST['step'])){ if($_POST['step'] == '1'){$mess = "<div align='center' class='errd'>name cannot be left blank!</div>"; }}} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add A New Subject</title>
<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif;
background:#FFCCFF;
}
.head{
border:#FF99FF dashed 3px;
}
.tbl1{
background-color: #FF99FF;
border:dashed #FF33FF 3px;
padding: 20px;
}
.btns{
		background:#FF66FF;
		font-weight:bold;
		border: #FFCCCC double 2px;
		padding:5px;
		}
		.btns:hover{
		background: #FF33FF;
		cursor:pointer;
		}
		.errd{
		color:#FF0000;
		font-size:large;
		}
</style>
</head>
<body bgcolor="#FFFF99">
<?php if($step == "0"){?>
<h1><center>Add a new subject</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eas.php">Add a subject</a> ><b> Step 1</b>
<hr />
<?php  echo($mess);  ?>
<form action="" method="POST">
<table align="center" width="200" border="0" class="tbl1">
  <tr>
    <td><b>Programme</b></td>
    <td><b> : </b></td>
    <td><select name="pro"><option>BE</option><option>MTech</option><option>MCA</option><option>MBA</option></select></td>
  </tr>
  <tr>
    <td><b>Department</b></td>
    <td><b> : </b></td>
    <td><select name="dept">
<option>PHYSICS</option>
<option>CHEMISTRY</option>
<option>MATHEMATICS</option>
<option>HSS</option>
<option>CIVIL</option>
<option>ELECTRICAL</option>
<option>MECHANICAL</option>
<option>COMPUTER SCIENCE</option>
<option>ELECTRONICS</option>
<option>INFORMATION SCIENCE</option>
<option>AUTOMOBILE</option>
<option>INDUSTRIAL PRODUCTION</option>
<option>INSTRUMENTATION</option>
<option>BIO TECHNOLOGY</option>
<option>MBA</option>
<option>MCA</option>
</select></td>
  </tr>
  <tr>
    <td><b>Semester</b></td>
    <td><b> : </b></td>
    <td><select name="sem">
<option>I</option>
<option>II</option>
<option>III</option>
<option>IV</option>
<option>V</option>
<option>VI</option>
<option>VII</option>
<option>VIII</option>
<option>SUPPLEMENTARY</option>
</select></td>
  </tr>
  <tr>
    <td><b>Division</b></td>
    <td><b> : </b></td>
    <td><select name="div">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>E</option>
<option>F</option>
<option>G</option>
<option>H</option>
<option>I</option>
<option>J</option>
</select></td>
  </tr>
  <tr>
    <td><b>Subject</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="name" /> 
    Without Space </td>
  </tr>
  <tr>
    <td><b>Subcode</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="subc" /></td>
  </tr>
  <tr>
    <td colspan="3"><input type="hidden" name="step" value="1" /><div align="center"><input type="submit" class="btns" /></div></td>
  </tr>
</table>
</form>
<?php } else if($step == "1") { echo($mess);
$name = $_POST['name'];
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);
$result = mysql_query("SELECT * FROM num WHERE name='sub'");

while($row = mysql_fetch_array($result))
  {
  $sun = $row['num'];
  }
 $div = $_POST['div']; 
  $rname = $name;
  $name = $_SESSION['usid']."vinaycksproject".$name."___".$div;
  
$sql = "CREATE TABLE ".$name."
(
srn text(99),
rollnum text(20),
usn text(20),
name text(50)
)";
$sun++;

$dept = $_POST['dept'];
$sem = $_POST['sem'];
$div = $_POST['div'];
$subcode = $_POST['subc'];
$prog = $_POST['pro'];



//$ins="INSERT INTO cou (id, name, dept, sem, div, subcode, prog) VALUES ('".$sun."', '".$name."', '".$dept."', '".$sem."', '".$div."', '".$subcode."', '".$prog."')";

$ins="INSERT INTO `cou` (
`id` ,
`name` ,
`dept` ,
`sem` ,
`div` ,
`subcode` ,
`prog` 
)
VALUES (
'$sun', '$name', '$dept', '$sem', '$div', '$subcode', '$prog'
);";

$int="INSERT INTO ".$name." (rollnum, usn, name) VALUES ('used by','system for', 'date')";
$ina="INSERT INTO ".$name." (rollnum, usn, name) VALUES ('used by','system for', 'time')";
$inb="INSERT INTO ".$name." (rollnum, usn, name) VALUES ('used by','system for', 'adate')";
$inc="INSERT INTO ".$name." (rollnum, usn, name) VALUES ('used by','system for', 'atime')";
$inh="INSERT INTO ".$name." (rollnum, usn, name) VALUES ('used by','system for', 'toco')";
mysql_query("INSERT INTO num (num, name) VALUES ('0','$name')");

if(mysql_query($sql,$con) && mysql_query("UPDATE num SET num = '$sun' WHERE name = 'sub'") && mysql_query($ins) && mysql_query($int) && mysql_query($ina) && mysql_query($inb) && mysql_query($inc) && mysql_query($inh)){
echo "
<h1><center>Add a new subject</center></h1><hr />
You are here: <a href='index.php'>Home</a> > <a href='eas.php'>Add a subject</a> ><b> Success</b>
<hr />
<div align='center'><h1>Subject has been created!</h1><br /><a href='index.php'>Home</a></div>";
}else{
echo "
<h1><center>Add a new subject</center></h1><hr />
You are here: <a href='index.php'>Home</a> > <a href='eas.php'>Add a subject</a> ><b> Error</b>
<hr />
<div align='center' class='errd'>There was a error creating the subject the resons maybe that there is a subject already by that name<br /><a href='index.php'>Home</a></div>".mysql_error();
}

mysql_close($con);
?>
<?php }else{;?>
<h1><center>Add a new subject</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eas.php">Add a subject</a> ><b> Fail</b>
<hr />
<div align='center' class='errd'>Error encountered please try again. Sorry!<br />
<a href="index.php">Home</a></div>
<?php } ?>
<br />
<br />
<hr />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>
