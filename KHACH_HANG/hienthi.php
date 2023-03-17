<?php
	$MSHH=$_GET['MSHH'];
	$query="select*from hanghoa where MSHH='$MSHH'";
	$result=$connect->query($query);
	$item=mysqli_fetch_array($result);
?>
<html>
	<head><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"></head>
</html>
<style>
	.hanghoa{
		background:#E0EEE0;
		margin:auto;
	}
	.ten{
		color:blue;
		font-size:40px;
		text-align: center;
		font-family:Time New Roman;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.quycach{
		margin-top:10px;
		font-size:25px;
		text-align:center;
	}
	.order{
		margin-top:10px;
	}
	.image{
		text-align: center;
		margin-top: 40px;
	}
	section>input{
		font-size:20px;
		background: #C6E2FF;
		border-radius: 5px;
		margin-top: 7px;
	}
	.gia{
		
		font-size:25px;
		text-align: center;
	}
	.name{
		
		font-size:25px;
		text-align: center;
	}
	.soluong{
		
		font-size:25px;
		text-align: center;
	}
	.quycach{
		
		font-size: 22px;
	}
	.dat{
		font-weight: bold;
		font-size:22px;
		font-family:Time New Roman;
		color:white;
		margin-top:20px;
		height:40px;
		width:155px;
		background:	#FF3030;
	}
	.binhluan{
		margin-left:50px;
		height:100px;
		width:600px;
		background:white;
	}
	input{
		margin-left:10px;
	}
	h1{
		font-size:25px;
		color:#006600;
		
	}
	.gui{
			height:25px;
			width:100px;
			border-radius:6px;
			margin-top:50px;
			margin-left:100px;
			font-size:20px;
		}
	.cmt{
			font-size:25px;
			margin-left:40px;
		}
	.sent{
			height:40px;
			width:100px;
			border-radius:6px;
			margin-top:10px;
			margin-left:560px;
			font-size:20px;
			background:#006600;
			color:white;
		}
	div.stars {
			width: 270px;
			display: inline-block;
		}
	input.star { display: none; }

	label.star {
		  float: right;
		  padding: 10px;
		  font-size: 30px;
		  color: #444;
		  transition: all .2s;
		}
	input.star:checked ~ label.star:before {
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}
	input.star-5:checked ~ label.star:before {
		  color: #FE7;
		  text-shadow: 0 0 20px #952;
		}
	input.star-1:checked ~ label.star:before { color: #F62; } 
	label.star:hover { transform: rotate(-15deg) scale(1.3); }
	label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}
	h2{
			margin-left:40px;
			font-size:25px;
		}
</style>
<h1 class="ten">Chi Tiết Sản Phẩm</h1>
	<section class="hanghoa">
	<section class="image"><img src="Image\<?=$item['image']?>" width="600" height="400"></section>
	<section class="name"><strong><?=$item['TenHH']?></strong></section>
	<section class="gia"><strong>Giá bán: <?=number_format($item['Gia'],0,',','.')?> vnđ</strong></section>
	<section class="soluong"><strong>Số lượng hàng còn: <?=$item['SoLuongHang']?></strong></section>
	<section class="quycach"><strong><i><h1>Chi tiết, Quy cách:</h1></i></strong> <strong><i><?=$item['QuyCach']?></strong></i></section>
	<section><center><input class="dat" type="button" value="Thêm giỏ hàng"onclick="location='?option=giohang&action=add&MSHH=<?=$item['MSHH']?>';"></center></section>
	<br>
	<br>
	<br>
	<h2><strong><i>Đánh giá của bạn:</strong></i></h2>
<div class="stars">
  <form action="">
    <input class="star star-5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>
  </form>
</div>
<br>
	<label><i><strong class="cmt">Bình luận sản phẩm:</i></strong> </label><input class="binhluan" type="text" name="HoTenKH">
	<br>
	<input class="sent" type="button" value="Gửi Đi" onclick="alert('Thông tin đóng góp của quý khách đã được ghi lại. Cảm ơn quý khách đã phản hồi !!!')">
	
	
</section>
