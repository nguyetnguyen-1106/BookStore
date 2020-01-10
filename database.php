<?php
    global $db;
    session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "bookstore";
	$db = new mysqli($servername, $username, $password, $database);
	require "user.php";
	require "model/law.php";
	require "model/history.php";
	require "model/art.php";
	require "model/children.php";
	require "model/curriculum.php";
	require "model/mentality.php";
	require "model/novel.php";
	require "model/science.php";
	$sql = "SELECT * from bookstore";
	$result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
	$bookstores = array();
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]['type']  == 'Chính trị, pháp luật'){
			$book = new Law($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == 'Khoa học công nghệ, kinh tế'){
			$book = new Sciences($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == "Văn hóa xã hội, lịch sử"){
			$book = new History($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == "Văn hóa nghệ thuật"){
			$book = new Art($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == "Giáo trình"){
			$book =  new Curriculum($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type'] == "Truyện, Tiểu thuyết"){
			$book = new Novel($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == "Tâm lý, Tâm linh, Tôn giáo"){
			$book = new Mentality($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], $result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
		if($result[$i]['type']  == "Sách thiếu nhi"){
			$book = new Children($result[$i]['id'], $result[$i]['title'],$result[$i]['author'],$result[$i]['publishing'],$result[$i]['numberOfPages'] ,$result[$i]['publishingYear'], 
				$result[$i]['price'], $result[$i]['image']);
			array_push($bookstores, $book);
		}
	} 
	function login($username, $password){
		global $db;
		$sql = "SELECT * from users";
		$result = $db->query($sql)->fetch_all();
		$check=false;
		for ($i=0; $i < count($result); $i++) { 
			if ($username == $result[$i][7] && $password==$result[$i][8]&& $result[$i][6] == "admin"){	
				$check=true;
				header("location: indexAdmin.php");
				break;
			}
			else if ($username == $result[$i][7] && $password==$result[$i][8]&& $result[$i][6] == "customer"){	
				$check=true;
				header("location: indexCus.php");
				$_SESSION["user"] = $username;
				$_SESSION["pass"] = $password;
				break;
			}
		}
		if($check==false){
			?>
				<script type="text/javascript">
					alert("Username hoặc Password của bạn không đúng");
				</script>
			<?php
		}
	}
	function IdUser(){
		global $db;
		$sql = "SELECT id from users where username='".$_SESSION["user"]."' and password='".$_SESSION['pass']."'";
		$result = $db->query($sql)->fetch_assoc();
		return $result['id'];
	}
	function cart($idPro, $idUser){
		global $db;
		$check = false;
		$sql = "SELECT * FROM cart where idUser=".IdUser();
		$result = $db->query($sql)->fetch_all();
		for ($i=0; $i < count($result); $i++) { 
		
			if($idPro == $result[$i][0]){

				 $sql1 = "UPDATE cart set quantity = ".($result[$i][1]+1)." where idPro = ".$result[$i][0] ;
				 $check = true;
				 $db->query($sql1);
			}
		}
		if($check == false){
			$sql2 = "INSERT INTO cart VALUES($idPro, 1, $idUser)";
			$db->query($sql2);
		}
	}    
	function delete($index){
		global $db;
		$sql = "DELETE from bookstore where id=". $index;
		$db->query($sql);
		header('Location: indexAdmin.php');
	}
    function add( $title,$author,$publishing,$page,$publishingYear,$type,$price,$image){
        global $db;
		$sql = "INSERT INTO bookstore (title, author,publishing, numberOfPages, publishingYear,type, price,image)
		VALUES ('$title','$author','$publishing','$page', '$publishingYear','$type','$price','$image')";
		$db->query($sql);
	}

	$sql = "SELECT * from users";
	$result = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
	$users = array();
	for($i = 0; $i < count($result); $i++) {
		$user = new User($result[$i]['id'],$result[$i]['fistName'],$result[$i]['lastName'],$result[$i]['address'],$result[$i]['phone'] ,$result[$i]['email'], $result[$i]['username'], $result[$i]['password'], $result[$i]['position']);
			array_push($users, $user);
	}