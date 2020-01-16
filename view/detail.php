<?php
require "../database/database.php";
if (isset($_POST['detail'])) {
	$id = $_POST['detail'];
	$sql = "SELECT * from products where id=" . $id;
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
	<link rel="shortcut icon" href="../image/book.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="grid-container" class="container">
		<div class="header">
			<?php require "header.php" ?>
		</div>
		<div class="bar">
			<?php require "bar.php" ?>
		</div>
		<a href="indexCus.php" style="margin-left: 40px;">Quay lại</a><br>
		<div style="display: flex; margin-top: 10px;">
			<div style="margin-left: 250px;">
				<img style="width: 350px; height: 400px;" src="<?php echo "../image/" . $result[0][8] ?>">
			</div>
			<div style="margin-left: 50px; margin-top: 15px;">
				<h3 class="text-primary"><?php echo $result[0][1] ?></h3>
				<p><?php echo "(" . $result[0][2] . ")" ?></p>
				<p><?php echo "Nhà xuất bản: " . $result[0][3] ?></p>
				<p><?php echo "Số trang: " . $result[0][4] . " trang" ?></p>
				<p><?php echo "Năm sản xuất: " . $result[0][5] ?></p>
				<p style="color: red"><?php echo "Giá: " . $result[0][6] . " VNĐ" ?></p>
			</div>
		</div>
	</div>
	<div class="bottom" style="border-top: 2px solid #dcdcdc; margin-top: 15px">
		<?php require "footer.php" ?>
	</div>
</body>

</html>