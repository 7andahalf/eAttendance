<?php
session_start();

include("sett.php");

if(isset($_POST['step'])){
$step = $_POST['step'];
}else{
$step = '1';
}

if($step == '2'){
$host=$host; // Host name usually localhost
$username=$user; // Mysql username 
$password=$pass; // Mysql password 
$db_name=$db; // Database name 
$tbl_name="members"; // Table name by default modify if you have changed it

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);


$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['usid'] = $_POST['myusername']; 
$usernamdsnbdj = $_POST['myusername'];
$con = mysql_connect($host,$user,$pass);
if (!$con)
  {
  die('Could not connect contact admin!');
  }
mysql_select_db($db, $con);

$result = mysql_query("SELECT * FROM members WHERE username = '$usernamdsnbdj'");
while($row = mysql_fetch_array($result))
  {
	$name = $row['name'];
  }
  
mysql_close($con);	
$_SESSION['namee'] = $name;
header("location:index.php");
}
else {
?>
<style type="text/css">
.err{
font-family:Arial, Helvetica, sans-serif;
font-size:26px;
color:#FF0000;
text-align:center;
}
.info{
font-family:Arial, Helvetica, sans-serif;
font-size:18px;
font-weight:100;
}
</style>
<div align="center"><span class="err">Wrong Username or Password combination!</span><br /><span class="info">Please go back and try again.</span></div>
<?php
}
}
?>
<?php if($step == '1'){ ?>
<html>
<head>
<title>Login</title>
<style type="text/css">
body{
background-color:#FFCCFF;
font-family:Arial, Helvetica, sans-serif;
font-size:medium;
}
.tbl{
background:#FFCCCC;
border:#FF66FF dotted medium;
padding: 20px;
}
h1{
font-size:40px;
color: #990066;
}
.txt{
padding:2px;
background-color: #FFFFCC;
border:#FF00FF 1px double;
}
.btn{
padding:10px;
width:100px;
color: #990066;
font:bold 17px;
background-color:#FF99FF;
border:#FF33FF thin dashed;
}
.btn:hover{
color: #990066;
background-color: #FF66FF;
cursor:pointer;
}
</style>
</head>
<body>
<center><h1>eAttendance Login</h1></center><hr /><br /><br />
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" class="tbl" cellpadding="3" cellspacing="1">
<tr>
<td colspan="3" align="center"><strong></strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername" class="txt"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword" class="txt"></td>
</tr>
<tr>

<td colspan="3" align="center"><br /><input type="submit" name="Submit" value="Login" class="btn">
<input type="hidden" name="step" value="2">
</td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br />
<br />
<hr />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>
<?php } ?>