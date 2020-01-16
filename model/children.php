<?php
require_once "book.php";
class Children extends Book
{
	function getType()
	{
		return "Sách thiếu nhi";
	}
	function getImagePath()
	{
		return "../image/" . $this->image;
	}
	function getDisplayPrice()
	{
		return $this->price . " VND";
	}
}
