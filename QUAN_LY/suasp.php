<?php $loaihang1=mysqli_fetch_array($connect->query("select*from hanghoa where MSHH=".$_GET['MSHH']));
?>
<?php
	if(isset($_POST['TenHH'])){
		$TenHH=$_POST['TenHH'];
		$query="select*from hanghoa where TenHH='$TenHH' and MSHH!=".$loaihang1['MSHH'];
		if(mysqli_num_rows($connect->query($query))!=0){
				$alert="Tên loại hàng đã tồn tại!!!";
		}else{
				$status=$_POST['status'];
                $gia=$_POST['gia'];
				$connect->query("update hanghoa set TenHH='$TenHH', gia='$gia', status='$status' where MSHH=".$loaihang1['MSHH']);
				header("location: ?option=qlsanpham");
		}
	}
?>
<div class="tieude">
	<h1><i>Thêm Loại Hàng</i></h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post">
			<section>
				<label class="ten"> Tên Điện Thoại: </label><input value="<?=$loaihang1['TenHH']?>"type="text" name="TenHH">
			</section>
            <section>
				<label class="ten"> Giá sản phẩm: </label><input value="<?=$loaihang1['Gia']?>"type="text" name="gia">
			</section>
			<section>
				<label class="ten">Trạng Thái Hãng: </label><input value="1" type="radio" name="status" <?=$loaihang1['status']==1?'checked':''?>>Hoạt động <input type="radio" name="status" value="0" <?=$loaihang1['status']==0?'checked':''?>> Không còn hàng
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






