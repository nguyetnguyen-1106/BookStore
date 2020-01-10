<?php
	require_once "database.php";
	if(isset($_POST["delete"])){
		delete($_POST["delete"]);
	}
	if(isset($_POST["add"])){
		$title = $_POST["title"];
		$author = $_POST["author"];
		$publishing = $_POST["publishing"];
		$page = $_POST["numberOfPages"];
		$publishingYear = $_POST["publishingYear"];
		$type = $_POST["type"];
		$price = $_POST["price"];
		$image = $_POST["image"];
		if ($title == null || $author == null || $publishing == null || $page == null || $publishingYear == null || $type == null || $price == null || $image== null){
				echo '<script language="javascript">alert("Bạn phải điền đầy đủ thông tin");</script>';
		}
		elseif($page <= 0){
			echo '<script language="javascript">alert("Sách của bạn không tồn tại");</script>';
		}
		elseif($publishingYear > 2020){
			echo '<script language="javascript">alert("Sách của bạn chưa được sản xuất");</script>';
		}
		elseif($price <= 0){
			echo '<script language="javascript">alert("Kiểm tra lại giá của sản phẩm");</script>';
		}
		else{
			add($title,$author,$publishing,$page,$publishingYear,$type,$price,$image);
			echo '<script language="javascript">alert("Sản phẩm đã được thêm vào thành công");</script>';
			header('Location: indexAdmin.php');
		}
	}
	if(isset($_POST["update"])){
		$id = $_POST["id"];
		$title = $_POST['title'];
		$author = $_POST["author"];
		$publishing = $_POST["publishing"];
		$page = $_POST["numberOfPages"];
		$publishingYear = $_POST["publishingYear"];
		$price = $_POST["price"];
		$type = $_POST['type'];
		$sql = "UPDATE bookstore SET title = '$title', author='$author' ,publishing ='$publishing', numberOfPages='$page', publishingYear='$publishingYear',price='$price', type='$type' WHERE id=$id";
        $db->query($sql);
       	header('Location: indexAdmin.php');
	}
	if(isset($_POST['edit'])){  
        $id =$_POST['edit'];
        $sql = "SELECT * from bookstore where id =".$id;
        $result = $db->query($sql);
        while($book = $result->fetch_assoc())
        {
            $title = $book['title'];
            $author = $book['author'];
            $publishing = $book['publishing'];
            $numberOfPages = $book['numberOfPages'];
            $publishingYear = $book['publishingYear'];
            $price = $book['price'];
            $type = $book['type'];
        }
    }
    $sql = "SELECT * from users";
	$result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="image/book.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bookStore.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
	<div class="grid-container" class="container">
		<div class="header">
			<a href="indexAdmin.php"><img src="image/home.png" style="margin-left: 5px;" class="rounded" width="40px" height="40px;"></a>
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
				<p><a href="index.php">Đăng xuất</a></p>
			</div>
		</div>
		<div class="bar">
			<div>
				<img src="image/logo.png" class="rounded" width="250px" height="200px;">
				<form>
				<div class="input-group mb-3">
				    <input type="text" class="form-control" placeholder="Tìm kiếm">
				    <div class="input-group-append" style="margin-left: 0px;">
				      <button  class="input-group-text"><img src="image/loupe.png"></button>
				    </div>
				  </div>
				</form>
				<button style="margin-left: 200px; margin-top: -20px;" class="btn btn-danger">Giỏ hàng</button>					
			
			</div>
		</div>
		<div class="menu">
			<div class="list-group" style="margin-left: 40px; width: 350px;">
				<button type="button" class="list-group-item list-group-item-action active" style="font-size: 20px;">
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
			<div style="border-top: 2px solid #dcdcdc; margin-top: 20px;">
				<h1 style="margin-left: 500px;">Administrator</h1>
			</div>
			<form method="post">
				<div class="container-fluid">
	    			<div class="row">
	    				<div>
	    					<input type="text" class="form-control" hidden name="id" value="<?php if(isset($_POST['edit'])){ echo $id;}?>">
	    				</div>
	      				<div class="col-md-6 col-lg-3 ">
	      					<input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="<?php if(isset($_POST['edit'])){ echo $title;}?>">
	      				</div>
	      				<div class="col-md-6 col-lg-3" >
	      					<input type="text" class="form-control" name="author" placeholder="Tác giả" value="<?php if(isset($_POST['edit'])){ echo $author;}?>">
	 					</div>
	 					<div class="col-md-6 col-lg-3"  style="margin-bottom: 10px;">
	      					<input class="form-control" type="" name="publishing" placeholder ="Nhà sản xuất" value="<?php if(isset($_POST['edit'])){ echo $publishing;}?>">
	      				</div>
	      				<div class="col-md-6 col-lg-3">
	      					<input class="form-control" type="" name="numberOfPages" placeholder = "Số trang" value="<?php if(isset($_POST['edit'])){ echo $numberOfPages;}?>">
	 					</div>
	 					<div class="col-md-6 col-lg-3">
	      					<input class="form-control" type="" name="publishingYear" placeholder = "Năm sản xuất" value="<?php if(isset($_POST['edit'])){ echo $publishingYear; }?>">
	      				</div>
	      				<div class="col-md-6 col-lg-3">
	      					<input class="form-control" type="" name="price" placeholder = "Giá" value="<?php if(isset($_POST['edit'])){ echo $price; }?>">
	 					</div>
	 					<div class="col-md-6 col-lg-3">
	 						<select name="type" class="form-control">
	 							<option <?php if(isset($_POST['edit']) && ($type == "Chính trị, pháp luật")){ echo 'selected="selected"' ; }?> value="Chính trị, pháp luật">Chính trị, pháp luật</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Khoa học công nghệ, kinh tế")){ echo 'selected="selected"' ; }?>  selected="selected" value="Khoa học công nghệ, kinh tế">Khoa học công nghệ, kinh tế</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Văn hóa xã hội, lịch sử")){ echo 'selected="selected"' ; }?>  value="Văn hóa xã hội, lịch sử">Văn hóa xã hội, lịch sử</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Văn hóa nghệ thuật")){ echo 'selected="selected"' ; }?>  value="Văn hóa nghệ thuật">Văn hóa nghệ thuật</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Giáo trình")){ echo 'selected="selected"' ; }?>  value="Giáo trình">Giáo trình</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Truyện, Tiểu thuyết")){ echo 'selected="selected"' ; }?> value="Truyện, Tiểu thuyết">Truyện, Tiểu thuyết</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Tâm lý, Tâm linh, Tôn giáo")){ echo 'selected="selected"' ; }?> value="Tâm lý, Tâm linh, Tôn giáo">Tâm lý, Tâm linh, Tôn giáo</option>
	 							<option <?php if(isset($_POST['edit'])&& ($type == "Sách thiếu nhi")){ echo 'selected="selected"' ; }?>  value="Sách thiếu nhi">Sách thiếu nhi</option>
	 						</select>
	 					</div>
	 					<div class="col-sm-3 col-md-4 col-lg-3">
							<input type="file" name="image" id="fileToUpload" class="fileToUpload" >
	 					</div>
	 					<div class="col-sm-3 col-md-4 col-lg-3" style="margin: auto; margin-top: 10px;">
							<button name="add" class="btn btn-primary">Thêm</button>
	  						<button name="update" class="btn btn-primary">Cập nhật thông tin</button>		
  						</div>
 					</div>
   				</div>
   			</form>
			<table style="margin: 30px; margin-top: 30px;">
				<tr>
					<th>Hình ảnh</th>
					<th>Tiêu đề</th>
					<th>Tác giả</th>
					<th>Nhà sản xuất</th>
					<th>Số trang</th>
					<th>Năm sản xuất</th>
					<th>Giá </th>
					<th>Thể loại</th>
					<th>Tùy chọn</th>
				</tr>
				<?php
				for($i = 0; $i < count($bookstores); $i++){
				?>	
				<tr>
					<td><img class="pro-image" src=<?php echo $bookstores[$i]->getImagePath();?>></td>
					<td><?php echo $bookstores[$i]->title ?></td>
					<td><?php echo $bookstores[$i]->author?></td>
					<td><?php echo $bookstores[$i]->publishing ?></td>
					<td><?php echo $bookstores[$i]->numberOfPages ?></td>
					<td><?php echo $bookstores[$i]->publishingYear ?></td>
					<td><?php echo $bookstores[$i]->getDisplayPrice()?></td>
					<td><?php echo $bookstores[$i]->getType()?></td>
					<td>
						<div style="display: flex;">
							<form method='post'>
								<input type='text' hidden name='edit' value=<?php echo $bookstores[$i]->id?>><button class='btn btn-warning'><i class="far fa-edit"></i></button>
							</form>
							<form method="post">
								<input type='text' hidden name='delete' value="<?php echo $bookstores[$i]->id?>">
								<button class='btn btn-warning' style="margin-left: 5px;"><i class="far fa-trash-alt"></i></button>
							</form>
						</div>
						
					</td>
				</tr>
				<?php
				}
				?>
			</table>
			<div style="border-top: 2px solid #dcdcdc; margin-top: 20px;">
				<h1 style="margin-left: 450px;">Thông tin khách hàng</h1>
			</div>
			<table style="width: 1000px; margin: auto;">
				<tr>
					<th>STT</th>
					<th>Tên</th>
					<th>Địa chỉ</th>
					<th>Điện thoại</th>
					<th>Email</th>
					<th>User name</th>
					<th>Password</th>
					<th>Vị trí</th>
				</tr>
				<?php
				for ($i=0; $i < count($users); $i++) { 
				?>
				<tr>
					<td><?php echo $users[$i]->id?></td>
					<td><?php echo $users[$i]->fistName." ".$users[$i]->lastName?></td>
					<td><?php echo $users[$i]->address?></td>
					<td><?php echo $users[$i]->phone ?></td>
					<td><?php echo $users[$i]->email ?></td>
					<td><?php echo $users[$i]->username ?></td>
					<td><?php echo $users[$i]->password?></td>
					<td><?php echo $users[$i]->position?></td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>	
	<div class="bottom" style="border-top: 2px solid #dcdcdc; margin-top: 20px;">
		<div style="text-align: center; color: gray">
			<h3>Follow up</h3>
		</div>
		<div style="text-align: center; margin-bottom: 10px;>
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
		</div>
</body>
</html>