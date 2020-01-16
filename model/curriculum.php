<?php
require_once "book.php";
class Curriculum extends Book
{
	function getType()
	{
		return "Giáo trình";
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
