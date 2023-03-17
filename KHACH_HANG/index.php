<?php  session_start();?>
<?php $connect = new MySQLi('localhost','root','','quanlydathang');
mysqli_set_charset($connect, 'UTF8');
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Hệ thống website cửa hàng điện thoại</title>
	<meta charset='UTF-8' />
<style>
header,nav,nav>a,aside,article,footer{float: left; border: blue thin solid; box-sizing: border-box;}
header{width: 100%; height: 120px; background:#F5F5F5;border: 2px;}
nav{width: 100%; height: 45px;border: 1px;}
nav>a{width: 14.5%; height: inherit; text-decoration: none; text-align: center; background: #DDDDDD;font-size: 25px; color:#333333}
.body{width: 100%; float: left;}
.body aside{width: 26%; min-height: 300px;}
.body article{width: 100%; min-height: 300px;  background: #EEEEEE;}
footer{ width: 100%; height: 100px;}
/*.loaihang a{display: block; text-decoration: none}
.loaihang{ background: #EEEEEE; margin-top: 15px; font-size: 25px;color:#006600;}
*/.ten{ font-family:Arial; text-align:center; font-size:29px;}
.as{font-size:20px;background: #EEEEEE;}
header img{
	padding-left:3px;
	height:100px;
	width: 350px;
	border-radius: 5px;
}
.head{
	height:720px;
	width: 270px;
}
.head img{
	height:720px;
	width: 2005px;
	border-radius: 5px;
}
.head1{
	background:;
	height:50px;	
}
.button{
	height:45px;
	border-radius: 8px;
}
.dangnhap{
	font-size:25px;
	text-align:center;
  	padding-top: 10px;
  	padding-bottom:10px;
  	padding-right:50px;
  	padding-left:50px;
  	font-size: 20px;
  	float: left; 
  	border: white thin solid; 
  	box-sizing: border-box;
  	text-decoration:none;
}
.timkiem{
	float:right;
	margin-top:4px;
	margin-right:5px;
}
.nhap{
	height:40px;
	width:300px;
	border-radius:10px;
}
.search{
	height:40px;
	width:90px;
	border-radius:10px;
	font-size:17px;
}
.lienhe{
	float:right;
	margin-top:20px;
	color:black;
	font-size:25px;
	font-family:time new roman;
	
}
.logo{
	height:86px;
	background:white;
}
/*font tím */
.dropbtn {
  background-color: #58257b;
  color: white;
  font-weight: bold;
  padding-top: 10px;
  padding-bottom:10px;
  padding-right:50px;
  padding-left:50px;
  font-size: 20px;
  float: left; 
  border: white thin solid; 
  box-sizing: border-box;
  text-decoration:none;
/*  cursor: pointer; Đây là thuộc tính giúp nó trở thành dạng có thể click*/
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #e9d8f4;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.0);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #58257b;
  color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}


.dropdown:hover .dropbtn {
  background-color: #984eca;
}

input[type="submit"]:hover {
	background:#9C9C9C
}
</style>
</head>
<body>
<section class="phandau">
<header class="logo" >
	<a href="?option=home"><img src="Image/img.jpg"></a>
	<a class="lienhe"><b>Email:Buonbandienthoai@gmail.com<br>Tel:0326567709</b></a>
</header></section>
	<section class="timkiem">
		<form>
			<input type="hidden" name="option" value="home">
			<input class="nhap" type="search" name="keyword"> <input class="search" type="submit" value="Tìm Kiếm">
		</form>
	</section>
	<nav>
		<button><a class="dropbtn" href ="?option=home">Danh sách sản phẩm</a></button>
		<div class="dropdown">
			<button><a class="dropbtn" >Sản phẩm theo loại</a></button>
			<div class="dropdown-content">
				<?php
				$query="select*from loaihang where status=1";
				$loaihang=$connect->query($query);
				foreach($loaihang as $loaihang1):
				?>
				<section class="loaihang"><a href="?option=timkiem&MaLoaiHangid=<?=$loaihang1['MaLoaiHang']?>"><?=$loaihang1['TenLoaiHang']?></a></section>
				<?php endforeach;?>
			</div>
		</div>
			<button><a class="dropbtn" href ="?option=baiviet">Bài Viết</a></button>
			<button><a class="dropbtn" href ="?option=giohang">Giỏ hàng</a></button>
			<button><a class="dropbtn" href ="?option=lienhe">Liên Hệ</a></button>
		<?php if(empty($_SESSION['khachhang'])): ?>
			<button><a class="dropbtn" href ="?option=signin">Đăng nhập</a></button><button><a class="dropbtn" href ="?option=register">Register</a></button><nav>
		<?php else:?>
			<button><section class="dangnhap"><strong> Xin chào: <span style ="color:blue"><?=$_SESSION['khachhang']?></span> [<a onclick="return confirm('Bạn có muốn đăng xuất?');" href="?option=Logout">Đăng xuất</a>]</strong></section></button>
		<?php endif;?>
<section class="body">
	<article>
	<?php 
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case'home':
				include"home.php";
			break;
			case'baiviet':
				include"baiviet.php";
			break;
			case'giohang':
				include"giohang.php";
			break;
			case"signin":
				include"signin.php";
			break;
			case"register":
				include"register.php";
			break;
			case"timkiem":
				include"timkiemtheoloai.php";
			break;
			case"hienthi":
				include"hienthi.php";
			break;
			case"lienhe":
				include"lienhe.php";
			break;
			case"thanhtoan":
				include"thanhtoan.php";
			break;
			case"dathang":
				include"dathang.php";
			break;
			case"Logout":
				unset($_SESSION['khachhang']);
				header("location:?option=home");
			break;
		}
	}
	?>
	</article></section>
</body>
</html>