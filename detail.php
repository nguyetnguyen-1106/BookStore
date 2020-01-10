<?php
	require "database.php";
	if(isset($_POST['detail'])){
		$id = $_POST['detail'];
		$sql = "SELECT * from bookstore where id=".$id;
		$result = $db->query($sql)->fetch_all();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book store</title>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="grid-container" class="container">
		<div class="header">
				<a href="indexCus.php"><img src="image/home.png" style="margin-left: 5px;" class="rounded" width="40px" height="40px;"></a>
			<div>
				<img src="image/help.png">
				<p>Trợ giúp</p>
			</div>
			<div>
				<img src="image/radio.png">
				<p>Tin tức</p>
			</div>
			<div>
				<img src="image/present.png">
				<p>Khuyến mãi</p>
			</div>
			<div>
				<img src="image/telephone.png">
				<p>Hot line: <span style="color: red">(+84) 359 405 417</span></p>
				</div>
			<div class="log">
				<p style="margin-right: 10px;"><a href="index.php">Đăng xuất</a></p>
			</div>
		</div>
		<div class="bar">
			<div>
				<img src="image/logo.png" class="rounded" width="250px" height="200px;">
				<form>
				<div class="input-group mb-3">
				    <input type="text" class="form-control" placeholder="Tìm kiếm">
				    <div class="input-group-append" style="margin-left: 0px;">
				      <button  class="input-group-text"><img src="image/loupe.png" ></button>
				    </div>
				  </div>
				</form>
				<button style="margin-left: 200px; margin-top: -20px;" class="btn btn-danger">Giỏ hàng</button>
			</div>
		</div>
	<div style="display: flex; margin-top: 10px;">
		<div style="margin-left: 250px;">
			<img style="width: 350px; height: 400px;" src="<?php echo "image/".$result[0][8]?>">
		</div>
		<div style="margin-left: 50px; margin-top: 15px;">
			<h3 class="text-primary"><?php echo $result[0][1]?></h3>
			<p><?php echo "(".$result[0][2].")" ?></p>
			<p><?php echo "Nhà xuất bản: ".$result[0][3] ?></p>
			<p><?php echo "Số trang: ".$result[0][4]." trang" ?></p>
			<p><?php echo "Năm sản xuất: ".$result[0][5] ?></p>
			<p style="color: red"><?php echo "Giá: ".$result[0][6]." VNĐ"?></p>
			<span>Số lượng: </span><input style="width: 80px; margin-bottom: 20px;" type="number" name="" min="0" placeholder="0"><br>
			<button class="btn btn-danger">Mua hàng</button>
		</div>
	</div>
</div>
	<div class="bottom" style="border-top: 2px solid #dcdcdc; margin-top: 15px">
		<div style="text-align: center; color: gray">
			<h3>Follow up</h3>
		</div>
		<div  style="text-align: center; margin-bottom: 10px;>
			<a href="https://www.facebook.com/profile.php?id=100008477829911"><img src="image/zalo.png"></a>
			<a href=""><img src="image/facebook.png"></a>
		</div>
		<div style="display: flex; background-color: black; color: white; justify-content: space-between;">
			<div style="margin-left: 220px;">
				<h2>Liên hệ</h2>
				<ul>
					<li><a style="color: white" href="https://www.google.com/maps/place/101B+L%C3%AA+H%E1%BB%AFu+Tr%C3%A1c,+An+H%E1%BA%A3i+%C4%90%C3%B4ng,+S%C6%A1n+Tr%C3%A0,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@16.0596577,108.2393135,17z/data=!3m1!4b1!4m5!3m4!1s0x3142177e16d75991:0x711c915f162f6505!8m2!3d16.0596526!4d108.2415022?hl=vi-VN"> 101B Lê Hữu Trác-Sơn Trà-Đà Nẵng</a></li>
					<li>(+84) 359 405 417</li>
					<li>nguyetnguyen@gmail.com</li>
				</ul>	
			</div>
			<div  style="margin-right: 220px;">
				<h2>Tài khoản của tôi</h2>		
				<ul>
					<li><a href="" style="color: white" data-toggle="modal" data-target="#loginForm">Đăng nhập/Tạo tài khoản mới</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>