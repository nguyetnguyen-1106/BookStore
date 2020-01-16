<?php
require_once "book.php";
class Novel extends Book
{
	function getType()
	{
		return "Truyện, Tiểu thuyết";
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
