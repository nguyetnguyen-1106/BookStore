<?php
require_once "book.php";
class Law extends Book
{
	function getType()
	{
		return "Chính trị - Pháp luật";
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
