<?php
	$query="select*from dathang where TrangThaiDH=".$_GET['TrangThaiDH'];
	$result=$connect->query($query);
?>
<h1><strong>Đơn Hàng</strong></h1>
<section class="sanpham">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<thead>
	<tr class="bieutuong">
		<td>Số Thứ Tự</td>
		<td>Mã Thanh Toán</td>
		<td>Ngày Đặt Hàng</td>
		<td>Lựa chọn</td>
	</tr>
	</thead>
	<tbody>
	<?php $count=1;?>
	<?php foreach($result as $item):?>
	<tr>
		<td><?=$count++?></td>
		<td><?=$item['MaThanhToan']?></td>
		<td><?=$item['NgayDH']?></td>
		<td><a href="?option=chitietdonhang&MaThanhToan=<?=$item['MaThanhToan']?>">
		<input type="button" value="Chi Tiết"></a>
		</td>
	</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	</section>
<style>
	h1{
		text-align:center;
		font-family:Time New Roman;
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
	

	


</style>
	
	