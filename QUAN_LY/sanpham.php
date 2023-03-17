<?php
	if(isset($_GET['MSHH'])){
		$MSHH=$_GET['MSHH'];
		$hanghoa=$connect->query("select*from hanghoa where MaLoaiHangid=$MSHH");
		if(mysqli_num_rows($hanghoa)!=0){
			$connect->query("update loaihang set status=0 where MaLoaiHang=$MaLoaiHang");
		}else{
			$connect->query("delete from loaihang where MaLoaiHang=$MaLoaiHang");
		}
		
	}
?>
<?php
	$query="select*from hanghoa";
	$result=$connect->query($query);
?>
<h1><strong>Danh Sách Sản Phẩm</strong></h1>
<section style="text-align:center;margin-bottom:20px;">
	<a href="?option=addqlsanpham" style="background-color:lightpink; font-weight:bold; font-size:20px; text-decoration:none; padding: 5px; border-radius: 5px;">
		Thêm sản phẩm</a></section>
<section class="sanpham">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<thead>
	<tr class="bieutuong">
		<td>STT</td>
		<td>MSHH</td>
		<td>Tên Hàng Hóa</td>
		<td>Giá Sản Phẩm</td>
		<td width="600px">Ảnh Sản Phẩm</td>
		<td>Trạng Thái</td>
		<td>Lựa chọn</td>
	</tr>
	</thead>
	
	<?php $count=1;?>
	<?php foreach($result as $item):?>
	<tr>
		<td><?=$count++?></td>
		<td><?=$item['MSHH']?></td>
		<td><?=$item['TenHH']?></td>
		<td><?=number_format($item['Gia'],0,',','.')?> vnđ</td>
		<td ><img src="../KHACH_HANG/Image/<?=$item['image']?>" width="45%"></td>
		<td><?=$item['status']==1?'Đang bán':'Không còn hàng'?></td>
		<td><a href="?option=suasp&MSHH=<?=$item['MSHH']?>"><input type="button" value="Chỉnh sửa"></a><strong> | 	
		</strong><a onclick="return confirm('Bạn có muốn xóa sản phẩm?');" href="?option=deletesp&MSHH=<?=$item['MSHH']?>"><input type="button" value="Xóa"></a></td>
	</tr>
	<?php endforeach;?>
	
	</table>
	</section>
<style>
	h1{
		text-align:center;
		font-family:Time New Roman;
		font-size:40px;
		margin-top:20px;
		margin-bottom:20px;
	}
	input{
		background:#E6E6FA;
	}
	.bieutuong{
		text-align:center;
		font-size:20px;
		background:#444444;
		color:white;
	}
	.sanpham{
		text-align:center;
		color:black;
		font-weight:bold;
	}
	td{
		margin-left:15px;
		margin-right:15px
	}
	input:hover{
		background:silver;
	}

	


</style>
	
	