<?php
	if(empty($_SESSION['giohang'])){
		$_SESSION['giohang']=array();
	}
	if(isset($_GET['action'])){
		$MSHH=isset($_GET['MSHH'])?$_GET['MSHH']:'';
		switch($_GET['action']){
			case'add':
			if(array_key_exists($MSHH, array_keys($_SESSION['giohang']))){
				$_SESSION['giohang'][$MSHH]++;
			}else{
				$_SESSION['giohang'][$MSHH]=1;
			}
				break;
			case'delete':
			unset($_SESSION['giohang'][$MSHH]);
			break;
			
		}
	}
?>
<section class="giohang">
<?php
	if(isset($_SESSION['giohang'])):
	$MSHH_1=implode(',', array_keys($_SESSION['giohang']));
	$query="select*from hanghoa where MSHH in($MSHH_1)";
	$result=$connect->query($query);
?>
	<h1 class="gio">Giỏ Hàng Của Bạn</h1>
	<table border="2" width="100%" cellpadding="0" cellspacing="0">
		<thead>
		<tr class="full">
			<td>Hình ảnh</td>
			<td>Tên</td>
			<td>Giá</td>
			<td>Số lượng</td>
			<td>Tổng giá</td>
		</tr>
		</thead>
		<tbody>
<?php
	$toTal=0;
//	if(isset($item))
//		echo "<script type='text/javascript'>alert('Giỏ hàng của bạn đang rỗng hãy nhanh vào danh sách sản phảm sắm cho nhanh mình một chiếc điện thoại thông minh nào!!');  location.href = '?option=home'; </script>";
//		else 
	if (is_array($result) || is_object($result))
		foreach($result as $item):
?>
		<tr>
			<td width="20%"><img width="100%" src="Image/<?=$item['image']?>"></td>
			<td width="20%" class="full1"><?=$item['TenHH']?><br><input class="dele" type="button" value="Delete" onclick="location='?option=giohang&action=delete&MSHH=<?=$item['MSHH']?>';"></td>
			<td width="20%" class="full1"><?=number_format($item['Gia'],0,',','.')?> vnđ</td>
			<td class="full1"><?=$_SESSION['giohang'][$item['MSHH']]?></td>
			<td class="full2"><?=number_format($SubTotal=$item['Gia']*$_SESSION['giohang'][$item['MSHH']],0,',','.')?> vnđ</td>
		</tr>
	<?php $toTal+=$SubTotal; ?>
<?php
	endforeach;
?>
	<tr>
		<td colspan="5">
		<section class="tong"><strong>Tổng Tiền:<?=number_format($toTal,0,',','.')?> vnđ</strong></section>
		<section class="giua"><input class="ogiua" type="button" value="Đặt Hàng" onclick="location='?option=dathang';"></section>
		</td>
	</tr>
	</table>
	</tbody>
<?php
	endif;
?>
</section>
<style>
	.dele{
		color:#006600;
		font-weight:bold;
	}
	.gio{
		color: #555555;
		font-size:45px;
		text-align: center;
		color:blue;
	}
	.full{
		text-align:center;
		font-size:23px;
		background:#222222;
		color:white;
	}
	.full1{
		text-align:center;
		font-size:23px;
	}
	.full2{
		text-align:center;
		font-size:23px;
	}
	.ogiua{
		margin-top:10px;
		text-align:center;
		font-size:25px;
		background:#EEEEEE;
		font-family:Time New Roman;
		color:#006600;
		font-weight:bold;
	}
	.tong{
		margin-top:10px;
		text-align:center;
		border-radius:5px;
		font-size:22px;
	}
	.giua{
		text-align:center;
	}
	input{
		border-radius:7px;
	}
</style>