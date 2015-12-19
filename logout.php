<?php
session_start();
session_destroy();
?>
<html>
<head>
<title>Logout</title>
<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif;
background-color:#FFCCFF;
}
h2{
font-family:Arial, Helvetica, sans-serif;
font-size:24px;
color:#009900;
}
</style>
</head>
<body>
<h2><center>You Have successfully logged out<br /></center></h2>
<center><a href="login.php">Login again</a></center>
</body>
</html>