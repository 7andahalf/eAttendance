<?php session_start(); 
include"auth.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Management System</title>
<style type="text/css">
body{
background-color:#FFCCFF;
font-family:Arial, Helvetica, sans-serif;
}
.ifr{
border: #FF66FF dotted 4px;
}
a{
text-decoration: none;
color:#0000FF;
}
a:hover{
text-decoration: underline;
color:#0000CC;
}
.men{
border-right:#FF33FF dotted 2px;
}
</style>
</head>
<body bgcolor="#D3EEC8"><center>
<hr />
<h1>Welcome to eAttendance</h1></center>
<hr />
<table width="100%" border="0">
  <tr>
    <td class="men" width="26%"><h3><center>MENU</center></h3>
<ul>
<li><a href="eat.php">Enter Attendance</a></li>
<li><a href="cat.php">Change Attendance</a></li>
<li><a href="eas.php">Add A new subject</a></li>
<li><a href="ims.php">Import Students</a></li>
<li><a href="sr.php">Show Report</a></li>
<li><a href="sr2.php">Show Report(without dates)</a></li>
<?php if($_SESSION['usid'] == 'admin'){ ?>
<li><a href="at.php">Add a new teacher</a></li>
<li><a href="imt.php">Import Teachers</a></li>
<?php } ?>
<!--<li><a href="op.exe">Download Opera browser</a></li>-->
<li><a href="help.html">Help Me!</a></li>
<li><a href="credits.html">Credits</a></li>
<li><a href='cp.php'>Change Password</a></li>
<li><a href='logout.php'>Logout</a></li>
</ul>
</td>
<td width="12%"></td>
    <td width="62%"><iframe align="center" class="ifr" id="if" src="welcome.html" width="400" height="100"></iframe></td>
  </tr>
</table>
<hr />
<br />
<center><a style="text-decoration:none;" href="credits.html">----[ &copy; VINAY C K ] [ Developed by VINAY C K ] [vinayck.work@gmail.com]----</a></center>
</body>
</html>
