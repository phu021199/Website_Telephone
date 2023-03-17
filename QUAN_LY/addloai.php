<?php
	if(isset($_POST['TenLoaiHang'])){
		$TenLoaiHang=$_POST['TenLoaiHang'];
		$query="select*from loaihang where TenLoaiHang='$TenLoaiHang'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)==1){
				$alert="Tên loại hàng đã tồn tại!!!";
		}else{
				$status=$_POST['status'];
				$query="insert loaihang(TenLoaiHang,status) value('$TenLoaiHang','$status')";
				$connect->query($query);
				echo '<script>alert("Thêm loại hàng thành công!!! "); </script>';
			}
	}
?>	<div class="tieude">
	<h1>Thêm Loại Hàng</h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post">
			<section><label> Tên Loại Hàng: </label><input type="text" name="TenLoaiHang"></section>
			<section><label>Trạng thái: </label><input value="1" type="radio" name="status" checked>Hoạt động <input type="radio" name="status" value="0"> Không còn loại hàng này</section>
			<section><input type="submit" value="Thêm loại hàng"></section>	
	</div>
<style>
	.tieude{
		text-align:center;
	}
</style>






