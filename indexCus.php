<?php
	require "database.php";
	if (isset($_POST['cart'])) {
		$idPro = $_POST['cart'];
		$idUser = IdUser();
		cart($idPro,$idUser);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/book.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
</head>
<body>
	<div class="grid-container" class="container">
		<div class="header">
				<img src="image/home.png" style="margin-left: 5px;"> 
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
			<div style="margin: 30px;">
				<h1>Sản phẩm phổ biến</h1>
			</div>
			<div class="container-product">
			<?php  
			for($i = 0; $i < count($bookstores); $i++){
			?>	
			<div>
				<div class="container">
					<img class="image" src=<?php echo $bookstores[$i]->getImagePath();?>>
					<div class="middle">
						<div class="text">
							<h3><?php echo $bookstores[$i]->title ?></h3>
							<p><?php echo "(".$bookstores[$i]->author.")" ?></p>
							<p><?php echo "Nhà xuất bản: ".$bookstores[$i]->publishing ?></p>
							<p><?php echo "Số trang: ".$bookstores[$i]->numberOfPages." trang" ?></p>
							<p><?php echo "Năm sản xuất: ".$bookstores[$i]->publishingYear ?></p>
							<p><?php echo "Giá: ".$bookstores[$i]->getDisplayPrice()?></p>
							<div style="display: flex; margin-left:50px;">
								<form method="post">
									<button name="cart" class="btn btn-danger" value=<?php echo $bookstores[$i]->id;?>>Mua hàng</button>
								</form>
								<form action="detail.php" method="post">
									<button name="detail" style="margin-left: 5px;" class="btn btn-danger" value=<?php echo $bookstores[$i]->id ;?>>Chi tiết</button>	
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			</div>
		</div>
	<div class="bottom" style="border-top: 2px solid #dcdcdc;">
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
					<li><a href="" style="color: white">Đăng nhập/Tạo tài khoản mới</a></li>
				</ul>
			</div>
		</div>
	</div>
		<div class="modal fade" id="loginForm">
	    	<div class="modal-dialog">
	    		<div class="modal-content">
	    		<div class="modal-header">
        			<h4 class="modal-title"><img src="image/login.png"></h4>
        		</div>
        		<form method="POST">
	        		<div class="modal-body">
						<input type="text" class="form-control" name="user" placeholder="Username"><br>
						<input type="password" class="form-control" name="pass" placeholder="Password"><br>
						<p style="margin-left: 320px; margin-bottom: 0px;"><a href="register.php" >Tạo tài khoản mới</a></p>  

					</div> 
	        		<div class="modal-footer">
	          			<button name="lg" type="submit" class="btn btn-danger" style="margin: auto;">Đăng nhập</button>	  
	       			</div> 
       			</form>  
     			</div>
			</div>
		</div>
	</div>
</body>
</html>