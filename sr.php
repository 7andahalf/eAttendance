<?php
session_start();
include"auth.php";

$mess = '';
include("sett.php");
if(isset($_POST['step']) && $_POST['step'] != ''){ $step = $_POST['step']; }else{ $step = "0"; } 
if(isset($_POST['name']) && $_POST['name'] != ''){ $step = '1'; }else{ $step = "0";if(isset($_POST['step'])){ if($_POST['step'] == '1'){$mess = "<div align='center' class='errd'>Subject cannot be left blank!</div>"; }}} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter A New Subject</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript">

			$(function(){

				// Datepicker
				$('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
				$('#datepicker2').datepicker({ dateFormat: 'dd-mm-yy' });
				
			});
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
		.data{
		font-size:12px;
		}
		</style>
</head>
<body bgcolor="#FFFF99">
<?php if($step == "0"){ ?>
<h1><center>Show Report</center></h1><hr />
You are here: <a href="index.php">Home</a> > <a href="sr.php">Show Report</a> ><b> Step 1</b>
<hr />
<?php  echo($mess); ?>
<form action="" method="POST">
<table width="751" border="0" align="center">
  <tr>
    <td>Subject:</td>
     <td> <select name="name"><option></option>
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
</select></td>
  </tr>
  <tr>
    <td width="118"> From:</td>
      <td width="202"><input type="text" name="d1" id="datepicker" /></td>
    <td width="85">To:</td>
      <td width="328"><input type="text" name="d2" id="datepicker2" />DD-MM-YYYY</td>
  </tr>
  <tr>
    <td>Roll.no. Above:</td><td><input type="text" name="rn1" /></td>
    <td>And Below:</td><td><input type="text" name="rn2" /></td>
  </tr>
  <tr>
    <td>Percentage Above:</td><td><input type="text" name="p1" /></td>
    <td>And Below:</td><td><input type="text" name="p2" /></td>
  </tr>
  <tr>
    <td colspan="4"><center><input type="hidden" name="step" value="1" /><input type="submit" /></center></td>
  </tr>
</table>
</form>
<?php } else if($step == "1") {
if(isset($_POST['d1']) && isset($_POST['d2']) && $_POST['d1'] != '' && $_POST['d2'] != ''){
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				
	
	$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

$msub = $_POST['name'];
$result = mysql_query("SELECT * FROM cou WHERE name = '$msub'");
while($row = mysql_fetch_array($result))
  {
	$dept = $row['dept'];
	$sem = $row['sem'];
	$div = $row['div'];
	$subcode = $row['subcode'];
	$prog = $row['prog'];
  }
  
mysql_close($con);			
?>
<table width="100%" border="1" class="data">
  <tr>
    <td colspan="9" bgcolor="#CCCCCC"><h1><b><center>Attendance report</center></b></h1></td>
  </tr>
  <tr>

	<td width="*" colspan="2"><center><strong>Faculty: </strong><?php echo($_SESSION['namee']); ?></center></td>
  <td width="*"><center><strong>Programme: </strong><?php echo($prog); ?></center></td>

		<td width="*"><center><strong>Department: </strong><?php echo($dept); ?></center></td>
	<td width="*"><center><strong>Semister: </strong><?php echo($sem); ?></center></td>
	</tr>
	<tr>
	<td width="*"><center><strong>Division: </strong><?php echo($div); ?></center></td>
	<td width="*"><center><strong>Total Classes: </strong><span id="tocod"></span></center></td>
	
	    <td width="*"><center><strong>Subject: </strong><?php $sdhiu = $_POST['name']; 
		list($usser, $assscads) = explode("vinaycksproject",$sdhiu);
		echo ($assscads);
		?></center></td>
	<td width="*"><center><strong>Subject Code: </strong><?php echo($subcode); ?></center></td>
	    <td width="*"><center><strong>Date: </strong><?php echo("From ".$d1." to ".$d2); ?></center></td>
  </tr>
</table>
<?php }else{
	$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

$msub = $_POST['name'];
$result = mysql_query("SELECT * FROM cou WHERE name = '$msub'");
while($row = mysql_fetch_array($result))
  {
	$dept = $row['dept'];
	$sem = $row['sem'];
	$div = $row['div'];
	$subcode = $row['subcode'];
	$prog = $row['prog'];
  }
  
mysql_close($con);	
 ?>
<table width="100%" border="1" class="data">
  <tr>
    <td bgcolor="#CCCCCC" colspan="8"><h1><b><center>Attendance report</center></b></h1></td>
  </tr>
  <tr>
  <td width="13%"><center><strong>Faculty: </strong><?php echo($_SESSION['namee']); ?></center></td>
  <td width="12%"><center><strong>Programme: </strong><?php echo($prog); ?></center></td>

		<td width="20%"><center><strong>Department: </strong><?php echo($dept); ?></center></td>
		
	<td width="*"><center><strong>Total Classes: </strong><span id="tocod"></span></center></td>
		</tr>
	<tr>
	<td width="10%"><center><strong>Semister: </strong><?php echo($sem); ?></center></td>
	<td width="9%"><center><strong>Division: </strong><?php echo($div); ?></center></td>
	
	    <td width="26%"><center><strong>Subject: </strong><?php $sdhiu = $_POST['name']; 
		list($usser, $assscads) = explode("vinaycksproject",$sdhiu);
		
		list($usasdkhuser, $asscajkhjkds) = explode("___",$assscads);
		echo ($usasdkhuser);
		?></center></td>
	<td width="10%"><center><strong>Subject Code: </strong><?php echo($subcode); ?></center></td>
	
	
  </tr>
</table>
<?php
}
	//include_once("phpReportGen.php");

	
	$prg = new phpReportGenerator();
    $prg->width = "100%";
	$prg->cellpad = "0";
	$prg->cellspace = "0";
	$prg->border = "";
	$prg->header_color = "#CCCCCC";
	$prg->header_textcolor="#111";
	$prg->header_alignment = "center";
	$prg->body_alignment = "center";
	//$prg->body_color = "#EEE";
	$prg->body_textcolor = "#000";
	$prg->surrounded = '1';
	mysql_connect($host,$user,$pass);

	mysql_select_db($db);

	$sub = $_POST['name'];
		if($_SESSION['usid'] == 'admin'){
	list($usadsadser, $asscaasdds) = explode("vinaycksproject",$sub);
	$subb = $_POST['name'];
	}else{
	$subb = $_POST['name'];
	}
	
	$res = mysql_query("select * from $subb");
	$prg->mysql_resource = $res;
	$prg->header = "";
	$prg->generateReport();
	}
	class phpReportGenerator
{
	var $mysql_resource;
	var $header;
	var $foolter;
    var $fields = array();
	var $cellpad;
	var $cellspace;
	var $border;
	var $width;
	var $modified_width;
	var $header_color;
	var $header_textcolor;
	var $header_alignment;
	var $body_color;
	var $body_textcolor;
	var $body_alignment;
	var $surrounded;
	
	function generateReport()
	{
		$this->border = (empty($this->border))?"0":$this->border;
		$this->cellpad = (empty($this->cellpad))?"1":$this->cellpad;
		$this->cellspace = (empty($this->cellspace))?"0":$this->cellspace;
		$this->width = (empty($this->width))?"100%":$this->width;
		$this->header_color = (empty($this->header_color))?"#FFFFFF":$this->header_color;
		$this->header_textcolor = (empty($this->header_textcolor))?"#000000":$this->header_textcolor;		
		$this->header_alignment = (empty($this->header_alignment))?"left":$this->header_alignment;
		$this->body_color = (empty($this->body_color))?"#FFFFFF":$this->body_color;
		$this->body_textcolor = (empty($this->body_textcolor))?"#000000":$this->body_textcolor;
		$this->body_alignment = (empty($this->body_alignment))?"left":$this->body_alignment;
		$this->surrounded = (empty($this->surrounded))?false:true;
		$this->modified_width = ($this->surrounded==true)?"100%":$this->width;
		
		if (!is_resource($this->mysql_resource))
			die ("There is no Subject Like that!");

		$field_count = mysql_num_fields($this->mysql_resource);
		$i = 0;
		
		while ($i < $field_count)
		{
			$field = mysql_fetch_field($this->mysql_resource);
			$this->fields[$i] = $field->name;
			$this->fields[$i][0] = strtoupper($this->fields[$i][0]);
			$i++;
		}
		
		echo "<h1><center><b>".$this->header."</i></center></h1>";
		echo "<P></P>";

		if ($this->surrounded == true) 
			echo "<table width='$this->width'  border='1' cellspacing='0' cellpadding='0'><tr><td>";
			
		echo "<table class='data' width='$this->modified_width'  border='$this->border' cellspacing='$this->cellspace' cellpadding='$this->cellpad'>";
		echo "<tr bgcolor = '$this->header_color'>";
$data = array();
		for ($i = 0; $i< $field_count; $i++)
		{
		$er = '0';
			if(isset($_POST['d1']) && isset($_POST['d2']) && $_POST['d1'] != '' && $_POST['d2'] != '' && $i > 2){
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				$cd1 = strtotime($d1);
				$cd2 = strtotime($d2);
				list($daatytyf, $sacjk, $gyuggyu) = explode(" ",$this->fields[$i]);
			$data['head'][$i] = $daatytyf;
				$ed1 = strtotime($data['head'][$i]);
				$er = '0';
				if($ed1 >= $cd1 && $ed1 <= $cd2){}else{$er = '1';}
				
			}
			if($i >= 3)
			{
			if($er == '0'){
			echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>&nbsp;".$this->fields[$i]."</font></th>";
			}
			}else{
			if($i != '0'){
			echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>&nbsp;".$this->fields[$i]."</font></th>";
			}}
			if($i == 3  && isset($_POST['d1']) && $_POST['d1'] != '' && isset($_POST['d2']) && $_POST['d2'] != ''){echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>&nbsp;name</font></th>";}
		}
			echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>Present Days</font></th>";
			echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>Absent Days</font></th>";
			echo "<th align = '$this->header_alignment'><font color = '$this->header_textcolor'>Attendance percentage</p></font></th>";
		echo "</tr>";
		$q = 0;



		while ($rows = mysql_fetch_row($this->mysql_resource))
		{
			if($q >= 2){
			$ab = 0;
			$pr = 0;
			for ($i = 0; $i < $field_count; $i++)
			{
			if(isset($_POST['d1']) && isset($_POST['d2']) && $_POST['d1'] != '' && $_POST['d2'] != '' && $i > 2){
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				$cd1 = strtotime($d1);
				$cd2 = strtotime($d2);
				$ed1 = strtotime($data['head'][$i]);
				$er = '0';
				
				if($ed1 >= $cd1 && $ed1 <= $cd2){}else{$er = '1';}
			}
			
				if($i > 2 && $er != '1'){
				if($rows[$i] == 'A'){
				$data[$q][$i] = $rows[$i];
				$ab++;
				}else{
				$data[$q][$i] = $rows[$i];
				$pr++;
				}
				}else{
				$data[$q][$i] = $rows[$i];
				}
				
			}
			$pe = $pr / ($pr + $ab) * 100;
			$data[$q]['per'] = round($pe, 2);
			$data[$q]['abd'] = $ab;
			$data[$q]['prd'] = $pr;
			}
			$q++;
		}
		
		//data entry
		
		$q = 5;
		$uhggy = count($data) + 1;
		if(isset($_POST['d1']) && $_POST['d1'] != '' && isset($_POST['d2']) && $_POST['d2'] != ''){$uhggy--;}
		while ($q <= $uhggy)
		{
		$err = '0';
	
		if(isset($_POST['rn1']) && isset($_POST['rn2']) && $_POST['rn1'] != '' && $_POST['rn2'] != ''){
		$rn1 = $_POST['rn1'];
		$rn2 = $_POST['rn2'];
		if($data[$q][1] >= $rn1 && $data[$q][1] <= $rn2){}else{$err = '1';}
		}
		
		if(isset($_POST['p1']) && isset($_POST['p2']) && $_POST['p1'] != '' && $_POST['p2'] != ''){
		$p1 = $_POST['p1'];
		$p2 = $_POST['p2'];
		if($data[$q]['per'] >= $p1 && $data[$q]['per'] <= $p2){}else{$err = '1';}
		}
		
		

		
		
		
		if($err == '0'){
		$ab = 0;
		$ad = 0;
			$pr = 0;
			echo "<tr align = '$this->body_alignment' bgcolor = '$this->body_color'>";
			for ($i = 0; $i < $field_count; $i++)
			{
			$er = '0';
			if(isset($_POST['d1']) && isset($_POST['d2']) && $_POST['d1'] != '' && $_POST['d2'] != '' && $i > 2){
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				$cd1 = strtotime($d1);
				$cd2 = strtotime($d2);
				$ed1 = strtotime($data['head'][$i]);
				$er = '0';
				
				if($ed1 >= $cd1 && $ed1 <= $cd2){}else{$er = '1';}
			}
			if($er == '0'){
				if($i > 3){
				if($data[$q][$i] == 'A'){
				$fgh = "<font color='red'><b>A</b></font>";
				$ab++;
				$ad++;
				}else{
				$fgh = "<font color='green'><b>P</b></font>";
				$pr++;
				}
				if($ab == '1'){
				echo "<td><font color = '$this->body_textcolor'><font color='red'><b>0</b></font></font></td>";
				$ab--;
				}else{
				echo "<td><font color = '$this->body_textcolor'><font color='Green'><b>".$pr."</b></font></font></td>";
				}		
				}else{
				if($i != '0'){
				echo "<td align='left'><font color = '$this->body_textcolor'>&nbsp;".$data[$q][$i]."</font></td>";
				}}}
				if($i == 3 && isset($_POST['d1']) && $_POST['d1'] != '' && isset($_POST['d2']) && $_POST['d2'] != ''){echo "<td align='left'><font color = '$this->body_textcolor'>&nbsp;".$data[$q][$i]."</font></td>";}
			}
			$toca = $pr + $ad;
			echo "<script type='text/javascript'>document.getElementById('tocod').innerHTML = '".$toca."';</script>";
			$pe = $pr / $toca * 100;
			echo "<td><font color = '$this->body_textcolor'>&nbsp;".$pr."</font></td>";
			echo "<td><font color = '$this->body_textcolor'>&nbsp;".$ad."</font></td>";
			echo "<td><font color = '$this->body_textcolor'>&nbsp;".round($pe, 2)."</font></td>";
			echo "</tr>";
			}
			$q++;
		}
		echo "</table>";
		if ($this->surrounded == true) 
			echo "</td></tr></table>";
	}
	
}
	?>
	<br />
<br />
<hr />
<center><a style="text-decoration:none; font-size:13px;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>
