<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//$_SESSION["username"]="";
//$_SESSION["usertype"]="";
//$_SESSION["loginstatus"]="";
   // unset($_SESSION["username"]);
   // unset($_SESSION["password"]);
   // unset($_SESSION["usertype"]);
   // unset($_SESSION["loginstatus"]);
	$_SESSION["loginstatus_wwtbam-fff"]="";
   
   session_unset();
   session_destroy();

header("location:loginform.php");
?>
</body>
</html>