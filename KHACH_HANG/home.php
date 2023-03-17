<?php
	$query = "select * from hanghoa where status=1";
	$result = $connect->query($query);
	if(isset($_GET['keyword'])){
		$query="select*from hanghoa where status=1 and TenHH like'%".$_GET['keyword']."%'";
		$result=$connect->query($query);
	}
?>
<style>
	.hanghoa .img>img{width: 100%}
	.hanghoa{width: 45.5%; float:left; border: blue thin solid; margin-left: 3%; height: 400px; margin-top: 20px; border-radius: 10px; background:#E0EEE0}
	.hanghoa .name{text-align: center; font-weight: bold;font-size:25px;}
	.hanghoa .gia{text-align: center; margin-top: 5px; font-size:25px;}
	.hanghoa .order{text-align: center; margin-top: 5px; font-size:25px;}
	.hanghoa{
		font-size:20px;
	}
	.img{
		text-align: center;
		margin-top: 40px;
	}
	.ten1{
		font-family:Time New Roman;
		color:blue;
		font-size:40px;
		text-align: center;
		margin-top:40px;
	}
	section>input{
		font-size:20px;
		background: #FF9933;
		border-radius: 5px;
		margin-top: 7px;
	}
	.gia{
		
		font-size:20px;
		text-align: center;
	}

</style>
	<header><h1 class="ten1">Danh Sách Điện Thoại Của Cửa Hàng</h1></header>
	<section>
	<?php foreach($result as $item):?>
	<section class="hanghoa">
	<section class="img"><a href="?option=hienthi&MSHH=<?=$item['MSHH']?>"><img src="Image/<?=$item['image']?>" width="300" height="230"></a></section>
	<section class="name"><?=$item['TenHH']?></section>
	<section class="gia"><strong>Giá bán:</strong> <strong><?=number_format($item['Gia'],0,',','.')?> vnđ</strong></section>
	</section>
	<?php endforeach;?>
	</section>
	
	
	