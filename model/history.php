<?php
require_once "book.php";
class History extends Book {
	function getType(){
		return "Văn hóa xã hội- Lịch sử";
	}
	function getImagePath(){
  		return "image/".$this->image;
  }
  function getDisplayPrice(){
    return $this->price." VND";
  }
}
?>