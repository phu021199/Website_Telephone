<?php
	if(isset($_SESSION['khachhang'])){
		$query="select*from khachhang where USERNAMEKH='".$_SESSION['khachhang']."'";
		$khachhang=mysqli_fetch_array($connect->query($query));}
	else{
		$khachhang['HoTenKH']='';
		$khachhang['TenCongTy']='';
		$khachhang['SoDienThoai']='';
	}
	
	if(isset($_POST['HoTenKH'])){
		$HoTenKH=$_POST['HoTenKH'];
		$TenCongTy=$_POST['TenCongTy'];
		$SoDienThoai=$_POST['SoDienThoai'];
		$SoFax=$_POST['SoFax'];
		$Ghichu=$_POST['Ghichu'];
		$MaThanhToan=$_POST['MaThanhToan'];
		$MSKH=$khachhang['MSKH'];
		$query="insert dathang(MaThanhToan, HoTenKH, MSKH, TenCongTy, SoDienThoai, Ghichu)
			values($MaThanhToan,'$HoTenKH','$MSKH','$TenCongTy','$SoDienThoai','$Ghichu')";
			$connect->query($query);	
		$query="select MaThanhToan from dathang order by MaThanhToan limit 1";
		$SoDonDH=mysqli_fetch_array($connect->query($query))['SoDonDH'];
		foreach($_SESSION['giohang'] as $key=>$value){
			$MSHH=$key;
			$SoLuong=$value;
			$query="select Gia from hanghoa where MSHH=$key";
			$GiaDatHang=mysqli_fetch_array($connect->query($query));
			$GiaDatHang=$GiaDatHang['Gia'];
			$query="insert chitietdathang(MSHH, SoDonDH, SoLuong, GiaDatHang) values($MSHH,'$SoDonDH','$SoLuong','$GiaDatHang')";
			$connect->query($query);	
			header("location: ?option=thanhtoan");
		}
	}
?>
<section class="tongthe">
<section class="dathang">
<form method="post">
<section class="form1">
<h1><i>Thông Tin Khách Hàng</i></h1>
	<section>
		<label><i><strong>Họ Tên Khách Hàng:</i></strong> </label><input  type="text" class="hoten" name="HoTenKH" value="<?=$khachhang['HoTenKH']?>">
	</section>
	<section>
		<label><i><strong>Công Ty Khách Hàng:</i></strong> </label><input type="text" class="congty" name="TenCongTy" value="<?=$khachhang['TenCongTy']?>">
	</section>
	<section>
		<label><i><strong>Điện Thoại Khách Hàng:</i></strong> </label><input type="text" class="tel" name="SoDienThoai" value="<?=$khachhang['SoDienThoai']?>">
	</section>
	<section>
		<label><strong><i>Ghi Chú Khách Hàng:</i></strong> </label><input type="text" class="ghichu" name="Ghichu">
	</section>
	
	<h2 class="phuongthuc"><i>Phương Thức Giao Hàng</i></h2>
<?php
	$query="select*from thanhtoan where Status";
	$result=$connect->query($query);
?>
	<section class="phuongthuc">
	<select name="MaThanhToan">
	<?php foreach($result as $item):?>
	<option value="<?=$item['id']?>"><?=$item['TenHinhThucTT']?></option>
	<?php endforeach; ?>
	</select>
	</section>
	<section class="thanhtoan">
		<input class="ttoan" type="submit" value="Thanh Toán" style="margin-top: 20px">
	</section>
	</section>
	</section>
	</section>

</form>
<style>
.phuongthuc{
	margin-top:40px;
}
label{
	font-size:30px;
}
h1{
		font-size:45px;
		text-align:center;
		color:#58257b;
}
.ttoan{
		width: 110px;
		height:35px;
		color:green;
		font-weight:bold;
	}
.dathang{
text-align: center;
margin-top: 40px;
max-width:950px;
margin:50px auto;
}
input{
	border-radius:7px;
	height:35px;
	margin-top:3px;
	background:#DDDDDD;
	font-weight:bold;
	font-size:15px;
}
.hoten{
		width:320px;
		
	}
	.congty{
		width:310px;
	}
	.tel{
		width:286px;
	}
	.ghichu{
		width:318px;
	}
	.fax{
		width:332px;
	}
.form1 {
color:Navy;
font-family: sans-serif;
font-weight:500px;;
font-size: 18px;
border-radius: 7px;
line-height: 22px;
border:2px solid #CC6666;
transition: all 0.3s;
padding: 13px;
margin-bottom: 15px;
width:100%;
box-sizing: border-box;
outline:0;
background-image: url("Image/giohang.jpg");
background-size: 1000px 700px;
background-repeat: no-repeat;
}
</style>