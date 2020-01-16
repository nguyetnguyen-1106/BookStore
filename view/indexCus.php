<?php
require "../database/database.php";
if (isset($_POST['cart'])) {
	$idPro = $_POST['cart'];
	$idUser = IdUser();
	cart($idPro, $idUser);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../image/book.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
</head>

<body>
	<div class="grid-container" class="container">
		<div class="header">
			<?php require "header.php" ?>
		</div>
		<div class="bar">
			<div>
				<img src="../image/logo.png" class="rounded" width="250px" height="200px;">
				<form method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="search" placeholder="Tìm kiếm">
						<div class="input-group-append" style="margin-left: 0px;">
							<button type="submit" name="nguyet" class="input-group-text"><img src="../image/loupe.png"></button>
						</div>
					</div>
				</form>
				<a href="cart.php"><button style="margin-left: 200px; margin-top: -20px;" class="btn btn-danger">Giỏ hàng</button></a>
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
						<img src="../image/main3.png" alt="" width="820" height="445">
					</div>
					<div class="carousel-item">
						<img src="../image/main2.png" alt="" width="820" height="445">
					</div>
					<div class="carousel-item">
						<img src="../image/main1.png" alt="" width="820" height="445">
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
				for ($i = 0; $i < count($bookstores); $i++) {
				?>
					<div>
						<div class="container">
							<img class="image" src=<?php echo $bookstores[$i]->getImagePath(); ?>>
							<div class="middle">
								<div class="text">
									<h3><?php echo $bookstores[$i]->title ?></h3>
									<p><?php echo "(" . $bookstores[$i]->author . ")" ?></p>
									<p><?php echo "Nhà xuất bản: " . $bookstores[$i]->publishing ?></p>
									<p><?php echo "Số trang: " . $bookstores[$i]->numberOfPages . " trang" ?></p>
									<p><?php echo "Năm sản xuất: " . $bookstores[$i]->publishingYear ?></p>
									<p><?php echo "Giá: " . $bookstores[$i]->getDisplayPrice() ?></p>
									<div style="display: flex; margin-left:50px;">
										<form method="post">
											<button name="cart" class="btn btn-danger" value=<?php echo $bookstores[$i]->id; ?>>Mua hàng</button>
										</form>
										<form action="detail.php" method="post">
											<button name="detail" style="margin-left: 5px;" class="btn btn-danger" value=<?php echo $bookstores[$i]->id; ?>>Chi tiết</button>
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
			<?php require "footer.php" ?>
		</div>
	</div>
</body>

</html>