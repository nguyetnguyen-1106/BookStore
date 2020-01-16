<?php
class User
{
	public $id;
	public $fistName;
	public $lastName;
	public $address;
	public $phone;
	public $email;
	public $username;
	public $password;
	public $position;
	public function __construct($id, $fistName, $lastName, $address, $phone, $email, $username, $password, $position)
	{
		$this->id = $id;
		$this->fistName = $fistName;
		$this->lastName = $lastName;
		$this->address = $address;
		$this->phone = $phone;
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->position = $position;
	}
}
