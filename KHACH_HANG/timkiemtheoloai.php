<?php
	if(isset($_GET['MaLoaiHangid'])){
		$query="select*from hanghoa where status=1 and MaLoaiHangid=".$_GET['MaLoaiHangid'];
		$result=$connect->query($query);
	}
?>
<html>
	<head><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"></head>
</html>
<style>
	.hanghoa{
		width: 45.5%;
		float:left; 
		border: blue thin solid;
		width:auto;
		height:auto;
		margin-top: 20px; 
		border-radius: 10px;
		background:#E0EEE0;
	}
	.tieude{
		font-family:Time New Roman;
		color:blue;
		font-size:40px;
		text-align: center;
		margin-top:40px;
		
	}
	.quycach{
		margin-top:20px;
		font-size:22px;
	}
	.img{
		text-align: center;
		margin-top: 40px;
	}
	.ten{
		font-family: Arial;
	}
	section>input{
		font-size:25px;
		background: #FF9933;
		border-radius: 5px;
		margin-top: 7px;
	}
	.gia{
		
		font-size:22px;
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
		margin-top: 15px;
		font-size:25px;
		text-align:center;
		margin-bottom:5px;
	}

	.binhluan{
		margin-left:50px;
		height:100px;
		width:600px;
		background:white;
	}
	h1{
		font-size:30px;
		color:#006600;
	}
	h2{
		margin-left:40px;
	}
	.cmts{
			font-size:30px;
			margin-left:60px;
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
		
</style>
<header><h1 class="tieude"><strong>Sản Phẩm Bạn Đã Tìm</strong></h1></header>
<section>
	<?php foreach($result as $item):?>
		<section class="hanghoa">
			<section class="img"><a href="?option=hienthi&MSHH=<?=$item['MSHH']?>"><img src="Image/<?=$item['image']?>" width="500" height="320"></a></section>
			<section class="name"><strong><?=$item['TenHH']?></strong></section>
			<section class="gia"><strong>Giá bán: <?=number_format($item['Gia'],0,',','.')?> vnđ</strong></section>
			<section class="soluong"><strong>Số lượng hàng còn: <?=$item['SoLuongHang']?></strong></section>
			<section class="quycach"><strong><i><h1>Chi tiết, quy cách:</h1></i></strong> <strong><i><?=$item['QuyCach']?></strong></i></section>
			<br>
			<br>
			<h2>Đánh giá của bạn</h2>
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
		</section>
	<?php endforeach;?>
</section>
