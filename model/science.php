<?php
require_once "book.php";
class Sciences extends Book {
	function getType(){
		return "Khoa học công nghệ - Kinh tế";
	}
	function getImagePath(){
  		return "image/".$this->image;
  	}
	function getDisplayPrice(){
	    return $this->price." VND";
 	}
}
?>