<?php
require_once "IBook.php";

abstract class Book implements IBook{
	public $id;
	public $title;
	public $author;
	public $publishing;
	public $numberOfPages;
	public $publishingYear;
	protected $price;
	protected $image;
	public function __construct($id, $title,$author, $publishing, $numberOfPages,$publishingYear, $price, $image) {
		$this->id = $id;
    	$this->title = $title;
    	$this->author = $author;
    	$this->publishing = $publishing;
    	$this->numberOfPages = $numberOfPages;
    	$this->publishingYear = $publishingYear;
    	$this->price = $price;
    	$this->image = $image;
  	}
}
?>