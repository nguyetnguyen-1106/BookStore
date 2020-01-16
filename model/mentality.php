<?php
require_once "book.php";
class Mentality extends Book
{
	function getType()
	{
		return "Tâm lý, tâm linh, tôn giáo";
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
