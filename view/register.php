<?php
require "../database/database.php";
if (isset($_POST['reg_user'])) {
	$firstName = $_POST["first"];
	$lastName = $_POST["last"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$position = $_POST["position"];
	$username = $_POST["user"];
	$password = $_POST["pass"];
	register($firstName, $lastName, $address, $phone, $email,$position,$username,$password);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book store</title>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../image/book.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="grid-container" class="container">
		<div class="header">
			<a href="index.php"><img src="../image/home.png" style="margin-left: 5px;" class="rounded" width="40px" height="40px;"></a>
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
			<div>
				<img src="../image/logo.png" class="rounded" width="250px" height="200px;">
				<form>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Tìm kiếm">
						<div class="input-group-append" style="margin-left: 0px;">
							<button class="input-group-text"><img src="../image/loupe.png"></button>
						</div>
					</div>
				</form>
				<button style="margin-left: 200px; margin-top: -20px;" class="btn btn-danger">Giỏ hàng</button>
			</div>
		</div>
		<div class="product">
			<div>
				<a href="index.php" style="margin-left: 20px;">Quay lại</a>
			</div>
			<div>
				<h3 class="text-primary" style="text-align: center; margin-bottom: 20px;">TẠO TÀI KHOẢN</h3>
				<form class="" action="" method="post">
					<div style="border: none; width: 400px; margin: auto;">
						<input class="form-control" type="text" name="first" placeholder="First Name"><br>
						<input class="form-control" type="text" name="last" placeholder="Last Name"><br>
						<input class="form-control" type="text" name="address" placeholder="Address"><br>
						<input class="form-control" type="text" name="phone" placeholder="Phone"><br>
						<input class="form-control" type="text" name="email" placeholder="Email"><br>
						<select class="custom-select custom-select-sm" name="position">
							<option>user</option>
						</select>
						<input class="form-control" type="text" name="user" placeholder="Username" style="margin-top: 20px;"><br>
						<input class="form-control" type="password" name="pass" placeholder="Password"><br>


						<center><button class="btn btn-info" type="submit" name="reg_user" style="margin-bottom: 20px; margin-top: 20px;">Sign up</button><br></center>
					</div>
				</form>
			</div>
		</div>
		<div class="bottom" style="border-top: 2px solid #dcdcdc;">
			<?php require "footer.php" ?>
		</div>
	</div>
	</div>
</body>

</html>
