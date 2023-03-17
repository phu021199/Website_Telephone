<?php $connect = new MySQLi('localhost','root','','quanlydathang');
	mysqli_set_charset($connect, 'UTF8');
?>
<!DOCTYPE html>
<html>
	
<head>
	<title>Admin</title>
	<meta charset="utf-8">
</head>
<body>
<?php 
	if(empty($_SESSION['admin'])){
	include"../QUAN_LY/quantri.php";	
	}
?>
</body>
</html>