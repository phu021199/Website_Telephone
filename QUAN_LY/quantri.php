<?php
	$chuaxuly=mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=1"));
	$dangxuly=mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=2"));
	$daxuly=mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=3"));
	$huydonhang=mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=4"));
?>
<table class="bang" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td class="quantri"><b>Trang Quản Trị Admin</b></br><IMG class="image" SRC="../KHACH_HANG/Image/admin.jpg"></td>
		<td align="center" class="admin"><strong>Hệ Thống Quản Lí Sản Phẩm</strong></td>
	</tr>
	<tr>
		<td class="pas">
			<button><section class="loaihang"><a href="?option=loaihang"><input class="dropbtn" type="button" value="Quản Lý Loại Hàng"></section></button>
			<button><section class="qlsanpham"><a href="?option=qlsanpham"><input class="dropbtn" type="button" value="Quản Lý Sản Phẩm"></section></button>
			<div class="dropdown">
				<button><section class="chitietdonhang"><a><input class="dropbtn" type="button" value="Quản Lý Đơn Hàng"></section></a></button>
				<div class="dropdown-content">
				<section><a href="?option=order&TrangThaiDH=1">Đơn Hàng Chưa Xử Lý[<span style="color:red"><?=$chuaxuly?> đơn hàng</span>]</a></section>
				<section><a href="?option=order&TrangThaiDH=2">Đơn Hàng Đang Xử Lý[<span style="color:red"><?=$dangxuly?> đơn hàng</span>]</a></section>
				<section><a href="?option=order&TrangThaiDH=3">Đơn Hàng Đã Xử Lý[<span style="color:red"><?=$daxuly?> đơn hàng</span>]</a></section>
				<section><a href="?option=order&TrangThaiDH=4">Hủy Đơn Hàng[<span style="color:red"><?=$huydonhang?> đơn hàng</span>]</a></section>
				</div>
			</div>
		</td>
<style>
	/*Thanh cuộn và màu*/
.dropbtn {
  background-color: #58257b;
  color: white;
  font-weight: bold;
  padding: 16px;
  font-size: 16px;
  border: none;
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
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
/*Style khác*/
	.quantri{
		color:brown;
		font-size:25px;
		width:390px;
		text-align: center;
		border:1px;
		font-family:Arial;
	}
	.admin{
		font-size:30px;
  		color:deepskyblue;
	}
	.donhang{
		margin-left:50px;

	}
	.image{
		height:120px;
		
	}
	.bang{
		width:100%;
		height:400px;
	}
	.pas{
		font-size:20px;
	}
</style>
	<td>
	<?php
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case'loaihang':
			include"loaihang.php";
			break;
			case'addloai':
			include"addloai.php";
			break;
			case'qlsanpham':
			include"sanpham.php";
			break;
			case'addqlsanpham':
			include"addsanpham.php";
			break;
			case'chitietdonhang':
			include"chitietdonhang.php";
			break;
			case'order':
			include"hienthidonhang.php";
			break;
			case'sualoai':
			include"sualoai.php";
			break;
			case'suasp':
			include"suasp.php";
			break;
			case'deleteloai':
			$query="select*from loaihang where MaLoaiHangid=".$_GET['MaLoaiHang'];
			$result = $connect->query($query);
			if(mysqli_num_rows($result)!=0){
				$connect->query("update loaihang set status=0 where MaLoaiHang=".$_GET['MaLoaiHang']);
			}else{
				$connect->query("delete from loaihang where MaLoaiHang=".$_GET['MaLoaiHang']);
			}
			header("location: ?option=loaihang");
			break;
			case'deletesp':
				$query="select*from hanghoa where MSHH=".$_GET['MSHH'];
				$result = $connect->query($query);
				if(mysqli_num_rows($result)!=0){
					$connect->query("delete from hanghoa where MSHH=".$_GET['MSHH']);
				}
				header("location: ?option=qlsanpham");
				break;
		}
	}?>
	</td>