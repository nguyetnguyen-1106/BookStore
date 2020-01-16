<?php
require "../database/database.php";
if (isset($_POST["lg"])) {
	$username = $_POST["username"];
	$password = $_POST["pass"];
	login($username, $password);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../image/book.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
</head>

<body>
	<div class="grid-container" class="container">
		<div class="header">
			<a href="index.php"><img src="../image/home.png" style="margin-left: 5px;"></a>
			<div>
				<img src="../image/help.png">
				<p>Trợ giúp</p>
			</div>
			<div>
				<img src="../image/radio.png">
				<p>Tin tức</p>
			</div>
			<div>
				<img src="../image/present.png">
				<p>Khuyến mãi</p>
			</div>
			<div>
				<img src="../image/telephone.png">
				<p>Hot line: <span style="color: red">(+84) 359 405 417</span></p>
			</div>
			<div class="log">
				<p><a href="" class="" data-toggle="modal" data-target="#loginForm">Đăng nhập</a></p>
				<p style="margin-right: 10px;"><a href="register.php">Đăng kí</a></p>
			</div>
		</div>
		<div class="bar">
			<?php require "bar.php" ?>
		</div>
		<div class="menu">
			<div class="list-group" style="margin-left: 40px; width: 350px;">
				<button type="button" class="list-group-item list-group-item-action active">
					TẤT CẢ DANH MỤC
				</button>
				<form method="post">
					<button type="submit" name="cate" value="<?php echo "Chính trị, pháp luật" ?> " class="list-group-item list-group-item-action">CHÍNH TRỊ - PHÁP LUẬT</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Khoa học công nghệ, kinh tế" ?>">KHOA HỌC CÔNG NGHỆ - KINH TẾ</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php "Văn hóa xã hội, lịch sử" ?>">VĂN HÓA XÃ HỘI - LỊCH SỬ</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Văn hóa nghệ thuật" ?>">VĂN HÓA NGHỆ THUẬT</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Giáo trình" ?>">GIÁO TRÌNH</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Truyện, Tiểu thuyết" ?>">TRUYỆN, TIỂU THUYẾT</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Tâm lý, tâm linh, tôn giáo" ?> ">TÂM LÝ, TÂM LINH, TÔN GIÁO</button>

					<button type="submit" name="cate" class="list-group-item list-group-item-action" value="<?php echo "Sách thiếu nhi" ?>">SÁCH THIẾU NHI</button>
				</form>
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
						<img src="../image/main3.png" alt="" width="820" height="445">
					</div>
					<div class="carousel-item">
						<img src="../image/main2.png" alt="" width="820" height="445">
					</div>
					<div class="carousel-item">
						<img src="../image/main1.png" alt="" width="820" height="445">
					</div>
				</div>
			</div>
		</div>
		<div class="product">
			<div style="margin: 30px;">
				<h1>Sản phẩm phổ biến</h1>
			</div>
			<div class="container-product">
				<?php
				for ($i = 0; $i < count($bookstores); $i++) {
				?>
					<div>
						<div class="container">
							<img class="image" src=<?php echo $bookstores[$i]->getImagePath(); ?>>
							<div class="middle">
								<div class="text">
									<h3 class=""><?php echo $bookstores[$i]->title ?></h3>
									<p class=""><?php echo "(" . $bookstores[$i]->author . ")" ?></p>
									<p class=""><?php echo $bookstores[$i]->getDisplayPrice() ?></p>
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
			<?php require "footer.php" ?>
		</div>
		<div class="modal fade" id="loginForm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><img src="../image/login.png"></h4>
					</div>
					<form method="POST">
						<div class="modal-body">
							<input type="text" class="form-control" name="username" placeholder="Username"><br>
							<input type="password" class="form-control" name="pass" placeholder="Password"><br>
							<p style="margin-left: 320px; margin-bottom: 0px;"><a href="register.php">Tạo tài khoản mới</a></p>

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