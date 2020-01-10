<?php
	require "database.php";
	if(isset($_POST['reg_user'])){
		$firstName = $_POST["first"];
		$lastName = $_POST["last"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$position = $_POST["position"];
		$username = $_POST["user"];
		$password = $_POST["pass"];
		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($db, $sql);
	    if (mysqli_num_rows($result) > 0){
        	echo '<script language="javascript">alert("Tài khoản của bạn đã tồn tại"); window.location="register.php";</script>';
            die ();
   		}
   		else {
	        $sql = "INSERT INTO users
			VALUES (null,'$firstName','$lastName','$address','$phone', '$email','$position', '$username','$password')";
	        
	        if ($user = mysqli_query($db, $sql)){
	            echo '<script language="javascript">alert("Bạn đã đăng ký thành công"); window.location="indexCus.php";</script>';
	        }
   		}
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
				<a href="index.php"><img src="image/home.png" style="margin-left: 5px;" class="rounded" width="40px" height="40px;"></a>
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
				<p><a href="" class="" data-toggle="modal" data-target="#loginForm">Đăng nhập</a></p>
				<p style="margin-right: 10px;"><a href="register.php">Đăng kí</a></p>
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
							<option>customer</option>
						</select>
						<input class="form-control" type="text" name="user" placeholder="Username" style="margin-top: 20px;"><br>
						<input class="form-control" type="password" name="pass" placeholder="Password"><br>
						
						
						<center><button class="btn btn-info" type="submit" name="reg_user" style="margin-bottom: 20px; margin-top: 20px;">Sign up</button><br></center>
					</div>
				</form>
			</div>
		</div>
		<div class="bottom" style="border-top: 2px solid #dcdcdc;">
			<div style="text-align: center">
				Follow up
			</div>
			<div  style="text-align: center">
				<a href=""><img src="image/zalo.png"></a>
				<a href="https://www.facebook.com/profile.php?id=100008477829911"><img src="image/facebook.png"></a>
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
				<div style="margin-right: 220px;">
					<h2>Tài khoản của tôi</h2>		
					<ul>
						<li><a href="" style="color: white" data-toggle="modal" data-target="#loginForm">Đăng nhập/Tạo tài khoản mới</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
	</div>	
</body>
</html>