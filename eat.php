<?php
session_start(); 
include"auth.php";

$sun = -20;
$mess = '';
include("sett.php");
if(isset($_POST['step']) && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0"; } 
if(isset($_POST['name']) && $_POST['name'] != '' || isset($_POST['sub']) && $_POST['step'] == '2' && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0";if(isset($_POST['step'])){ if($_POST['step'] == '1'){$mess = "<div align='center' class='errd'>Subject cannot be left blank!</div>"; }}}

if(isset($_POST['toco']) && $_POST['toco'] != '' || isset($_POST['sub']) && $_POST['step'] == '2' && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0";if(isset($_POST['toco'])){ if($_POST['step'] == '1'){$mess = "<div align='center' class='errd'>Topic covered cannot be left blank!</div>"; }}}
 
if($step == '1'){
$date = $_POST['date'];
if (($timestamp = strtotime($date)) === false) {
$step = "0";
	$mess = "<div class='errd'align='center'>Invalid Date entered (Date entered by you: ' $date ')</div>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter Attendance</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript">
			$(function(){

				// Datepicker
				$('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
				
				//$(".chk").hide();
				$(".chk2").hide();
				$("#otime").hide();
				document.getElementById('timm').name = 'unuasable';
				
				
			});
			var fre
			var dre
			var drsde
			function vinaysd(drsde){
			if(drsde == 'others'){
			$("#otime").show();
			document.getElementById('dummy').name = 'unuasable';
			document.getElementById('timm').name = 'time';
			}else{
			$("#otime").hide();
			document.getElementById('dummy').name = 'time';
			document.getElementById('timm').name = 'unuasable';
			}
			
			}
			
			function fr(fre , dre){
			if(dre == false){
			$(fre).show();
			}else{
			$(fre).hide();
			}
			}
		</script>
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
<?php if($step == "0"){  ?>
<h1><center>Enter Attendance</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eat.php">Enter Attendance</a> ><b> Step 1</b>
<hr />
<?php echo($mess); ?>
<form action="" method="POST">
<table width="500" border="0" align="center" class="tb2">
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
    <td><b>Time:</b></td>
    <td><b> : </b></td>
    <td><select name="time" onchange="javascript:vinaysd(this.value);" id="dummy" >
<option>8.00 AM</option>
<option>9.00 AM</option>
<option>10.15 AM</option>
<option>11.15 AM</option>
<option>01.00 PM</option>
<option>02.00 PM</option>
<option>03.15 PM</option>
<option>04.15 PM</option>
<option>05.15 PM</option>
<option>others</option>
</select><span id="otime"><input type="text" name="time" id="timm" />HH-MM<br /></div></td>
  </tr>
  <tr>
    <td><b>Date</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="date" id="datepicker" /></td>
  </tr>
  <tr>
    <td><b>Topic Covered</b></td>
    <td><b> : </b></td>
    <td><input type="text" name="toco" /></td>
  </tr>
  <tr>
    <td colspan="3"><center><input type="hidden" name="step" value="1" />
<input class="btns" type="submit" /></center></td>
  </tr>
</table>




</form>
<?php } else if($step == "1") {
$name = $_POST['name'];
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

$sub = $name;
$date = $_POST['date'];
$time = $_POST['time'];
$toco = $_POST['toco'];



$result = mysql_query("SELECT * FROM num WHERE name='$sub'");
while($row = mysql_fetch_array($result))
  {
  $sun = $row['num'];
  }
if($sun < 0){die("<div class='errd' align='center'>A subject must be chosen!".$sub."</div>");}
$dateti = $date . " " . $time;
$resultqq = mysql_query("ALTER TABLE ".$sub." ADD `".$dateti."` TEXT NOT NULL");
if(!$resultqq){die("<div class='errd' align='center'>Error! You Have Already Entered attendance for this date and time!</div>");}

?>
<h1><center>Enter Attendance Data</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eat.php">Enter Attendance</a> ><b> Step 2</b>
<hr />
<?php echo($mess); ?>
<form action="" method="POST">
<input type="hidden" name="step" value="2" />
<table border="0" align="center" class="tb3">
  <tr>
    <td><center><b>Roll.No.</b></center></td>
    <td><center><b>USN</b></center></td>
    <td><center><b>Name</b></center></td>
    <td><center><b>Attendance</b></center></td>
  </tr>
<?php
$i = '1';
while($i <= $sun){
$result = mysql_query("SELECT * FROM $sub WHERE srn='$i'");
while($row = mysql_fetch_array($result))
  {
  $rln = $row['rollnum'];
  $usn = $row['usn'];
  $nam = $row['name'];
  echo "<tr>
    <td class='tds'><center>".$rln."</center></td>
    <td class='tds'><center>".$usn."</center></td>
    <td class='tds'><center>".$nam."</center></td>
    <td class='tds'><center><input class='chk' id='y_".$i."' type=\"checkbox\" onclick='javascript:fr(\"#n_".$i."\", this.checked);' name=\"att_".$i."\" checked=\"checked\"><span class='chk2' id='n_".$i."'>X </spaN></center></td>
  </tr>";
  $i++;
  }
}


mysql_close($con);
?>
<tr>
    <td colspan="4"><center>
	<input type="hidden" name="date" value="<?php echo($date); ?>" />
	<input type="hidden" name="time" value="<?php echo($time); ?>" />
	<input type="hidden" name="toco" value="<?php echo($toco); ?>" />
	<input type="hidden" name="sub" value="<?php echo($sub); ?>" />
	<input type="hidden" name="sun" value="<?php echo($sun); ?>" />
	<input type="submit" class="btns" /></center></td>
  </tr>
</table>
</form>

<?php }else if($step == "2"){
$sub = $_POST['sub'];
$sun = $_POST['sun'];
$date = $_POST['date'];
$time = $_POST['time'];
$toco = $_POST['toco'];
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);
$dateti = $date . " " . $time;
$sub = strtolower($sub);


$i = '1';
while($i <= $sun){

if(isset($_POST['att_'.$i]) && $_POST['att_'.$i] != ''){
$att = "P";
}else{
$att = "A";
}

if(!mysql_query("UPDATE $sub SET `$dateti` = '$att' WHERE srn = '$i'")){die("Error conatct admin!");}

$i++;
}

if(!mysql_query("UPDATE $sub SET `$dateti` = '$date' WHERE name = 'date'")){die("Error conatct admin!");}
if(!mysql_query("UPDATE $sub SET `$dateti` = '$time' WHERE name = 'time'")){die("Error conatct admin!");}
if(!mysql_query("UPDATE $sub SET `$dateti` = '$toco' WHERE name = 'toco'")){die("Error conatct admin!");}
$dskdo = date("m.d.y");
$gtaf = date("H:i:s");
if(!mysql_query("UPDATE $sub SET `$dateti` = '$dskdo' WHERE name = 'adate'")){die("Error conatct admin!");}
if(!mysql_query("UPDATE $sub SET `$dateti` = '$gtaf' WHERE name = 'atime'")){die("Error conatct admin!");}
mysql_close($con);
?>
<h1><center>Enter Attendance</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eat.php">Enter Attendance</a> ><b> Success</b>
<hr />
<center><h1>Successfully entered Attendance!</h1><br />
<a href="index.php">Home</a></center>
<?php }else{?>
<h1><center>Enter Attendance</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="eat.php">Enter Attendance</a> ><b> Error</b>
<hr />
<center><h1>Error encountered please try again. Sorry!.</h1><br />
<a href="index.php">Home</a></center>
<?php } ?>
<br />
<br />
<hr />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>
