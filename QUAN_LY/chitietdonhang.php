<?php
	if(isset($_POST['TrangThaiDH'])){
		$connect->query("update dathang set TrangThaiDH=".$_POST['TrangThaiDH']." where MaThanhToan=".$_GET['MaThanhToan']);
	}
?>
<?php
	$query="select a.HoTenKH, a.SoDienThoai as 'SoDienThoaiKhachHang', a.TenCongTy as 'TenCongTyKhachHang', b.*,
	c.TenHinhThucTT as 'tenthanhtoan'
	from khachhang a join dathang b on a.MSKH=b.MSKH join thanhtoan c on b.MaThanhToan=c.id where b.MaThanhToan=".$_GET['MaThanhToan'];
	$dat=mysqli_fetch_array($connect->query($query));
?>
<center><h1>Chi Tiết Đơn Hàng
<br>(Mã Đơn Hàng: <?=$dat['SoDonDH']?>)</h1>
<h2>Ngày Tạo Đơn Đặt</h2>
<table border="1" width="50%" class="bang1">  
	<tr>
		<td><b><i>Ngày Tạo Đơn: </i></b></td>
		<td><b><?=$dat['NgayDH']?></b></td>
	</tr>
</table>
<h2>Thông Tin Người Mua Hàng</h2>
<table border="1" width="50%" class="bang1"> 
	<tr>
		<td><b><i>Họ Tên: </i></b></td>
		<td><b><?=$dat['HoTenKH']?></b></td>
	</tr>
	<tr>
		<td><b><i>Số Điện Thoại: </i></b></td>
		<td><b><?=$dat['SoDienThoaiKhachHang']?></b></td>
	</tr>
	<tr>
		<td><b><i>Tên Công Ty: </i></b></td>
		<td><b><?=$dat['TenCongTyKhachHang']?></b></td>
	</tr>
	<tr>
		<td><b><i>Ghi Chú: </i></b></td>
		<td><b><?=$dat['Ghichu']?></b></td>
	</tr>
</table>
<h2>Phương Thức Thanh Toán</h2>
<table border="1" width="50%" class="bang1"> 
	<tr>
		<td>Phương Thức Thanh Toán: </td>
		<td><?=$dat['tenthanhtoan']?></td>
	</tr>
</table>
<?php
	$query="select b.SoLuong,b.GiaDatHang,c.TenHH,c.image from dathang a 
	join chitietdathang b on a.MaThanhToan=b.SoDonDH join hanghoa c on b.MSHH=c.MSHH where a.MaThanhToan=".$dat['MaThanhToan'];
	$dathang=$connect->query($query);
?>
<form method="post">
<h2>Thông Tin Sản Phẩm Đã Đặt</h2>
<?php $count=1;?>
<table class="bang1" border="1">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên Sản Phẩm</th>
			<th>Ảnh Thông Tin Sản Phẩm</th>
			<th>Giá</th>
			<th>Số Lượng Đặt</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($dathang as $item):?>
		<tr class="tong">
			<td width="7%"><b><?=$count++?></b></td>
			<td width="15%"><b><?=$item['TenHH']?></b></td>
			<td width="30%"><img src="../KHACH_HANG/Image/<?=$item['image']?>"width="80%"></td>
			<td width="12%"><b><?=number_format($item['GiaDatHang'],0,',','.')?> vnđ</b></td>
			<td width="10%"><b><?=$item['SoLuong']?></b></td>
		</tr>
	<?php endforeach;?>
</tbody>
</table>
<h2>Trạng Thái Đơn Hàng</h2>
	<p><input class="in" type="radio" name="TrangThaiDH" value="1" <?=$dat['TrangThaiDH']==1?'checked':''?>><b>Chưa Xử Lý</b>
	<input class="in" type="radio" name="TrangThaiDH" value="2" <?=$dat['TrangThaiDH']==2?'checked':''?>><b>Đang Xử Lý</b>
	<input class="in" type="radio" name="TrangThaiDH" value="3" <?=$dat['TrangThaiDH']==3?'checked':''?>><b>Đã Xử Lý</b>
	<input class="in" type="radio" name="TrangThaiDH" value="4" <?=$dat['TrangThaiDH']==4?'checked':''?>><b>Hủy</b></p>
	<section>
		<center><input class="sub" type="submit" value="Cập Nhật Đơn Hàng" class="update"></center>
	</section>
</form>
	</center>
<style>
	.tong{
		text-align:center;
	}
	h1{
		color:black;
	}
	h2{
		color:black;
		font-size:30px;
	}
	.bang1{
		background:powderblue;
		color:black;
		margin-left:30px;
		font-size:18px;
	}
	.update{
		border-radius:5px;
	}
	.in{
		margin-left:50px;
	}
	.sub{
		text-align:center;
		font-family:Time New Roman;
		background:lightseagreen;
		color:white;
		font-size:25px;
		margin-bottom:40px;
	}
</style>

