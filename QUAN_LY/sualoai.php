<?php $loaihang1=mysqli_fetch_array($connect->query("select*from loaihang where MaLoaiHang=".$_GET['MaLoaiHang']));
?>
<?php
	if(isset($_POST['TenLoaiHang'])){
		$TenLoaiHang=$_POST['TenLoaiHang'];
		$query="select*from loaihang where TenLoaiHang='$TenLoaiHang' and MaLoaiHang!=".$loaihang1['MaLoaiHang'];
		if(mysqli_num_rows($connect->query($query))!=0){
				$alert="Tên loại hàng đã tồn tại!!!";
		}else{
				$status=$_POST['status'];
				$connect->query("update loaihang set TenLoaiHang='$TenLoaiHang', status='$status' where MaLoaiHang=".$loaihang1['MaLoaiHang']);
				header("location: ?option=loaihang");
		}
	}
?>
<div class="tieude">
	<h1><i>Thêm Loại Hàng</i></h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post">
			<section>
				<label class="ten"> Tên Loại Hàng: </label><input value="<?=$loaihang1['TenLoaiHang']?>"type="text" name="TenLoaiHang">
			</section>
			<section>
				<label class="ten">Trạng Thái Hãng: </label><input value="1" type="radio" name="status" <?=$loaihang1['status']==1?'checked':''?>>Hoạt động <input type="radio" name="status" value="0" <?=$loaihang1['status']==0?'checked':''?>> Không còn loại hàng này
			</section>
			<section>
				<input class="in" type="submit" value="Chỉnh sửa"> <a href="?option=loaihang" class="up">&lt;&lt;&lt; Trở lại</a>
			</section>
			
</div>
<style>
	.tieude{
		text-align:center;
	}
	h1{
		text-align:center;
		font-family:Time New Roman;
	}
	.ten{
		font-size:23px;
	}
	.in{
		margin-top:10px;
	}
</style>






