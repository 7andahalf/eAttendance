<?php
session_start(); 
include"auth.php";

$mess = '';
include("sett.php");
if(isset($_POST['step']) && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0"; } 
if(isset($_POST['name']) && $_POST['name'] != ''){ $step = '1'; }else{ $step = "0";if(isset($_POST['step'])){ if($_POST['step'] == '1'){$mess = "<div align='center' class='errd'>subject cannot be left blank!</div>"; }}} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Import students into a subject</title>
<style type="text/css">
		.chk {
  			width: 25px;
  			height: 25px;
			background-color:#FFCCCC;
			color:Green;
			border:0px dotted #00f;
		}
		.chk2 {
  			width: 25px;
  			height: 25px;
			background-color:#FFCCCC;
			color:Red;
			border:0px dotted #00f;
			font-size:34px;
			font-weight:bold;
		}
		body{
		background-color:#FFCCFF;
		font-family:Arial, Helvetica, sans-serif;
		}
		.tb2{
		background-color: #FFCCFF;
		border:#FF66FF dashed 2px;
		padding:20px;
		}
		.btns{
		background:#FF66FF;
		font-weight:bold;
		border:#FF99FF double 2px;
		padding:5px;
		}
		.btns:hover{
		background: #FF33FF;
		cursor:pointer;
		}
		.tb3{
		background:#FFCCCC;
		padding:20px;
		border: dashed #FF00CC 3px;
		}
		.errd{
		color:#FF0000;
		font-size:large;
		}
		.tds{
		border:#FF6699 1px solid;
		padding:4px;
	    }
		.tds:hover{
		border:#FF6699 2px solid;
		padding:3px;
	    }
		</style>
</head>
<body bgcolor="#FFFF99">
<?php if($step == "0"){ ?>
<h1><center>Import Students</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="ims.php">Import students</a> ><b> Step 1</b>
<hr />
<?php echo($mess); ?>
<form action="" method="POST" enctype="multipart/form-data">
<table width="600" border="0" align="center" class="tb2">
  <tr>
    <td><b>Subject</b></td>
    <td><b> : </b></td>
    <td><select name="name">
	<option></option>
<?php
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

if($_SESSION['usid'] == 'admin'){
$result = mysql_query("SELECT * FROM cou");
while($row = mysql_fetch_array($result))
  {
  $sun = $row['name'];
  list($user, $asscads) = explode("vinaycksproject",$sun);
  echo("<option value=\"".$sun."\">Faculty:".$user."  Sub:".$asscads."</option>");
  }} else {
  
  $result = mysql_query("SELECT * FROM cou");
while($row = mysql_fetch_array($result))
  {
  $sun = $row['name'];
  list($user, $asscads) = explode("vinaycksproject",$sun);
  if($asscads != '' && $user == $_SESSION['usid']){
  echo("<option value=\"".$sun."\">".$asscads."</option>");
  
  }}}
  
mysql_close($con);
?>
</select>

</td>
  </tr>
  <tr>
    <td><b>Students Data File</b></td>
    <td><b> : </b></td>
    <td><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td colspan="3"><center><input type="hidden" name="step" value="1" />
<input class="btns" type="submit" /></center></td>
  </tr>
</table>

</form>
<?php } else if($step == "1") { echo($mess);

$name = $_POST['name'];
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect. contact admin!');
  }
mysql_select_db($db, $con);

//start of upload
if($_FILES["file"]["error"] > 0){
die("<div align='center' class='errd'>No such file found!</div>");
}

$filea = $_FILES["file"]["tmp_name"];
$row = 1;
if (($handle = fopen($filea, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
		if($num != '3'){die("<div align='center' class='errd'>invalid csv excel file!</div>");}
        
		$rn = $data[0];
		$us = $data[1];
		$nm = $data[2];
		$int="INSERT INTO ".$name." (srn, rollnum, usn, name) VALUES ('$row' ,'$rn','$us', '$nm')";
		$row++;
		if(!mysql_query($int)){die("error! there is no subject like that!<br /><a href='index.php'>Home</a>");}
    }
    fclose($handle);
}
$row--;
if($row <= 0){echo("<div align='center' class='errd'>No such file found!<br /><a href='index.php'>Home</a></div>");}else{
?>
<h1><center>Import Students</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="ims.php">Import students</a> ><b> Success</b>
<hr />
<div align="center"><h3>Successfully Imported <?php echo $row; ?> students from the excel!</h1><br /><a href='index.php'>Home</a></div>
<?php
mysql_query("UPDATE num SET num = '$row' WHERE name = '$name'");
}
mysql_close($con);

?>
<?php }else{?>
<h1><center>Import Students</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="ims.php">Import students</a> ><b> Error</b>
<hr />
<div align="center" class="errd">
<h1>Error encountered please try again. Sorry!</h1><br />
<a href="index.php">Home</a></div>
<?php } ?>
<br />
<br />
<hr />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>