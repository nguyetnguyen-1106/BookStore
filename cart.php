<?php
	require "database.php";
	$idUser = IdUser();
	$sql = "SELECT b.image, b.title, c.quantity, b.price from bookstore as b, cart as c where b.id=c.idPro and c.idUser =".$idUser;
	$result = $db->query($sql)->fetch_all(); 
?>																									
<!DOCTYPE html>
<html>
<head>
	<title>Book store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" href="image/book.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
</head>
<body>
	<div class="grid-container" class="container">
		<div class="header">
				<a href="indexCus.php"><img src="image/home.png" style="margin-left: 5px;"></a> 
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
				<button style="margin-left: 200px; margin-top: -20px;" class="btn btn-danger"><a href="cart.php" style="color: white">Giỏ hàng</a></button>
			</div>
		</div>
		<div class="menu">
			<div class="list-group" style="margin-left: 40px; width: 350px;">
				<button type="button" class="list-group-item list-group-item-action active">
				    TẤT CẢ DANH MỤC
				</button>
				<button type="button" class="list-group-item list-group-item-action">CHÍNH TRỊ - PHÁP LUẬT</button>
				<button type="button" class="list-group-item list-group-item-action">KHOA HỌC CÔNG NGHỆ - KINH TẾ</button>
				<button type="button" class="list-group-item list-group-item-action">VĂN HÓA XÃ HỘI - LỊCH SỬ</button>
				<button type="button" class="list-group-item list-group-item-action">VĂN HÓA NGHỆ THUẬT</button>
				<button type="button" class="list-group-item list-group-item-action">GIÁO TRÌNH</button>
				<button type="button" class="list-group-item list-group-item-action">TRUYỆN, TIỂU THUYẾT</button>
				<button type="button" class="list-group-item list-group-item-action">TÂM LÝ, TÂM LINH, TÔN GIÁO</button>
				<button type="button" class="list-group-item list-group-item-action">SÁCH THIẾU NHI</button>
			</div>
		</div>
		<div class="main">
			<div id="demo" class="carousel slide" data-ride="carousel">
			  	<ul class="carousel-indicators">
				   	<li data-target="" data-slide-to="0" class="active"></li>
				    <li data-target="" data-slide-to="1"></li>
				    <li data-target="" data-slide-to="2"></li>
			  	</ul>
				<div class="carousel-inner">
				    <div class="carousel-item active">
				      	<img src="image/main1.png" alt="" width="820" height="445">
				    </div>
				    <div class="carousel-item">
				     	<img src="image/main2.png" alt="" width="820" height="445">
				    </div>
				    <div class="carousel-item">
				      	<img src="image/main3.png" alt="" width="820" height="445">
				    </div>
				</div>
					<a class="carousel-control-prev" href="main" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="main" data-slide="next">
					    <span class="carousel-control-next-icon"></span>
					</a>
			</div>
		</div>
		<div class="product">
			<h3 style="text-align: center;  margin-top: 20px;">Giỏ hàng của bạn</h3>
			<table style="margin: auto; margin-top: 20px; width: 700px;">
				<tr>
					<th>Gỡ bỏ</th>
					<th>Hình ảnh</th>
					<th>Tiêu đề</th>
					<th>Số lượng</th>
					<th>Giá </th>
				</tr>
			<?php
			for($i = 0; $i < count($result); $i++){
			?>	
				<tr>
					<form>
						<td><a href="" name="dele"><img src="image/error.png" style="width: 25px; height: 25px;"></a></td>
					</form>
					<td><img src="<?php echo "image/".$result[$i][0]?>"></td>
					<td><?php echo $result[$i][1] ?></td>
					<td><?php echo $result[$i][2] ?></td>
					<td><?php echo $result[$i][3] * $result[$i][2]?></td>
				</tr>
			<?php
			error_reporting(0);
				$sum += $result[$i][3] * $result[$i][2];
			}
			?>
			</table>
			<div style=" border: 1px solid black; border-top: 0px; width: 700px; height: 35px; margin: auto; text-align: right;">
				<b>Tổng:</b>
				<span style="margin-left: 15px;"><?php echo $sum." VNĐ"?> </span>
			</div>
			<form>
				<button style="margin-left: 560px; margin-top: 15px; margin-bottom: 15px;" class="btn btn-danger"><a style="color: white" href="" class="" data-toggle="modal" data-target="pay">Thanh toán</a></button>
			</form>
			
		</div>
	<div class="bottom" style="border-top: 2px solid #dcdcdc;">
		<div style="text-align: center; color: gray">
			<h3>Follow up</h3>
		</div>
		<div  style="margin-left: 600px; margin-bottom: 10px;>
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
					<li><a href="" style="color: white" >Đăng nhập/Tạo tài khoản mới</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<div class="modal fade" id="pay">
    	<div class="modal-dialog">
    		<div class="modal-content">
    		<div class="modal-header">
    			<h4 class="modal-title">Thông tin khách hàng</h4>
    		</div>
    		<form method="POST">
        		<div class="modal-body">
					<input type="text" class="form-control" name="user" placeholder="Họ và tên"><br>
					<input type="text" class="form-control" name="pass" placeholder="Địa chỉ"><br>
					<input type="text" class="form-control" name="user" placeholder="Số điện thoại"><br>
					<input type="text" class="form-control" name="pass" placeholder="Tổng tiền"><br><
				</div> 
        		<div class="modal-footer">
          			<button name="lg" type="submit" class="btn btn-danger" style="margin: auto;">Thanh toán</button>	  
       			</div> 
   			</form>  
 			</div>
		</div>
	</div>
</body>
</html>