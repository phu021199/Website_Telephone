<?php
	$query="select*from loaihang";
	$result = $connect->query($query);
?>
<h1 style="text-align:center; font-size:40px; font-family:Time New Roman;">Loại Hàng</h1>
<section style="text-align:center;margin-bottom:20px;"><a href="?option=addloai" style="background-color:lightpink; font-weight:bold; font-size:20px; text-decoration:none; padding: 5px; border-radius: 5px;">
Thêm Loại Hàng</a></section>
<section class="hanghoa">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<thead>
	<tr class="tua">
		<td>Mã Loại Hàng</td>
		<td>Tên Loại Hàng</td>
		<td>Trạng Thái</td>
		<td>Hành Động</td>
		
	</tr>
	</thead>
	<tbody>
	<?php foreach($result as $item):?>
	<tr>
		<td><?=$item['MaLoaiHang']?></td>
		<td><?=$item['TenLoaiHang']?></td>
		<td><?=$item['status']==1?'Hoạt động':'Không còn loại hàng này'?></td>
		<td><a href="?option=sualoai&MaLoaiHang=<?=$item['MaLoaiHang']?>"><input type="button" value="Chỉnh sửa"></a> | 
		<a onclick="return confirm('Bạn có muốn xóa loại sản phẩm?');" href="?option=deleteloai&MaLoaiHang=<?=$item['MaLoaiHang']?>"><input type="button" value="Xóa loại hàng"></a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</section>
<style>
.tua{
		text-align:center;
		font-size:23px;
		background:#222222;
		color:white;
	}
.hanghoa{
	text-align:center;
	color:black;
	font-weight:bold;
}
input{
	background:#E6E6FA;
}
input:hover{
	background:silver;
}

</style>