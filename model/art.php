<?php
require_once "book.php";
class Art extends Book {
	function getType(){
		return "Văn hóa nghệ thuật";
	}
	function getImagePath(){
  		return "image/".$this->image;
  }
  function getDisplayPrice(){
    return $this->price." VND";
  }
}
?>