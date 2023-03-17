<?php
	if(isset($_POST['TenHH'])){
		$TenHH=$_POST['TenHH'];
		$query="select*from hanghoa where TenHH='$TenHH'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)==1){
				$alert="Tên sản phẩm đã tồn tại!!!";
		}else{
				$MSHH=$_POST['MSHH'];
				$MaLoaiHangid=$_POST['MaLoaiHangid'];
				$QuyCach=$_POST['QuyCach'];
				$Gia=$_POST['Gia'];
				$SoLuongHang=$_POST['SoLuongHang'];
				$image=$_POST['image'];
				$status=$_POST['status'];
				$query="INSERT INTO `hanghoa`(`MSHH`, `MaLoaiHangid`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `image`, `status`) VALUES ('$MSHH', '$MaLoaiHangid', '$TenHH', '$QuyCach', '$Gia', '$SoLuongHang', '', '$image', '$status')";
				$connect->query($query);
				echo '<script>alert("Thêm sản phẩm thành công!!! ");</script>';
			}
	}
?>	<div class="tieude">
	<h1>Thêm Sản Phẩm</h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post">
			<section><label> Mã Số Hàng Hóa: </label><input type="text" name="MSHH"></section>
			<section><label> Mã Loại Hàng: </label><input type="text" name="MaLoaiHangid"></section>
			<section><label> Tên Sản Phẩm: </label><input type="text" name="TenHH"></section>
			<section><label> Quy Cách: </label><input type="text" name="QuyCach"></section>
			<section><label> Giá: </label><input type="text" name="Gia"></section>
			<section><label> Số Lượng Hàng: </label><input type="text" name="SoLuongHang"></section>
			<section><label> Image: </label><input type="text" name="image"></section>
			<section><label> Trạng thái: </label><input value="1" type="radio" name="status" checked>Đang bán <input type="radio" name="status" value="0"> Không còn hàng</section>
			<section><input type="submit" value="Thêm sản phẩm"></section>	
	</div>
<style>
	.tieude{
		text-align:center;
	}
</style>




