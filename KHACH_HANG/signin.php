<?php
	if(isset($_POST['USERNAMEKH'])){
		$USERNAMEKH = $_POST['USERNAMEKH'];
		$PASSWORD = md5($_POST['PASSWORD']);
		$query = "select*from khachhang where USERNAMEKH='$USERNAMEKH' and PASSWORD='$PASSWORD'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)==0){
				$alert="Bạn đã nhập sai tên đăng nhập hoặc mật khẩu";
		}else{
				$_SESSION['khachhang']=$USERNAMEKH;
				header("location:?option=home");
			}
		}
?>
<style>
.tongthe{
	text-align: center;
	background: url("Image/bgl.jpg") no-repeat center;
	object-fit: cover;
	background-size: 100% 100%;
	width: 100%; 
	float: left;
	height:720px;

}

h1{
	color:2px 2px #FF0000;
	font-size:50px;
	margin-top:60px;
	margin-bottom:60px;
	font-weight:bold:
}
h1{
	text-shadow: 2px 2px #FF0000;
}

label{
	color:black;
	font-size:40px;
}
input{
	height:40px;
	width:350px;
	font-size:25px;
	border-radius: 10px;
}
.login input{
	height:40px;
	width:180px;
	margin-left:190px;
	margin-top:30px;
	font-weight:bold;
	background-color:lightseagreen;
	color:white;
}

.login input[type="submit"]:hover {
background:Turquoise;
}

</style>
<section>
<div class="tongthe">
<h1>Đăng Nhập</h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
	<form method="POST">
	<section>
		<label><strong>Username:&nbsp;</strong> </label><input type="text" name="USERNAMEKH" placeholder="Nhập tên đăng ký">
	</section>
	<section>
		<label><strong>Password: &nbsp;</strong> </label><input type="PASSWORD" name="PASSWORD"  placeholder="Nhập mật khẩu">
	</section>
	</br>
	<section class="login"><input type="submit" value="Login">
	</section>
	</form>
	</section>
	</div>
	</section>
	