<?php
session_start(); 
$mess = '';
include"auth.php";
include("sett.php");
if(isset($_POST['step']) && $_POST['step'] != ''){ $step = $_POST['step'];}else{ $step = "0"; } 
if($_SESSION['usid'] != 'admin'){die("No access!");}
if($step == '1'){
if(isset($_POST['ui']) && $_POST['ui'] != ''){}else{$step = '0';$mess = '<div align="center" class="errd">Username cannot be left blank</div>';}

if(isset($_POST['pa']) && $_POST['pa'] != ''){}else{$step = '0';$mess = '<div align="center" class="errd">Password cannot be left blank</div>';}

if(isset($_POST['na']) && $_POST['na'] != ''){}else{$step = '0';$mess = '<div align="center" class="errd">Full name cannot be left blank</div>';}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Teacher</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
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
<?php if($step == "0"){?>
<h1><center>Add Teacher</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="at.php">Add Teacher</a> ><b> Step 1</b>
<hr />
<?php echo $mess; ?>
<form action="" method="POST">
<table width="500" border="0" align="center" class="tb2">
  <tr>
    <td><b>Username</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="ui" /></td>
  </tr>
  <tr>
    <td><b>Password</b></td>
    <td><b> : </b></td>
    <td><input type="password" name="pa" /></td>
  </tr>
  <tr>
    <td><b>Full Name</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="na" /></td>
  </tr>
  <tr>
    <td colspan="3"><center><input type="hidden" name="step" value="1" />
<input class="btns" type="submit" /></center></td>
  </tr>
</table>
</form>
<?php } else if($step == "1") {
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

$pa = $_POST['pa'];
$na = $_POST['na'];
$us = $_POST['ui'];
$tyfguystyg = $_SESSION['usid'];
if(!mysql_query("INSERT INTO members (username, password, name) VALUES ('$us', '$pa', '$na')")){
echo('<h1>Error in Adding teacher.</h1><br />
<a href="index.php">Home</a>');
}else{
echo('
<h1><center>Add Teacher</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="at.php">Add Teacher</a> ><b> Success</b>
<hr />
<div align="center"><h1>Successfully Added teacher.</h1><br />
<a href="index.php">Home</a></div>');
}


mysql_close($con);
?>
<?php }else{?>
<h1><center>Add Teacher</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="at.php">Add Teacher</a> ><b> Error</b>
<hr />
<div align="center" class="errd">
<h1>Error encountered please try again. Sorry!.</h1><br />
<a href="index.php">Home</a></div>
<?php } ?>
<br />
<br />
<hr />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>

