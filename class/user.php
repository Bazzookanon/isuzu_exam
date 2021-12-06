<?php
session_start();  
/**
 * 
 */
class SignUpCont extends Register
{
	public $fname;
	public $email;
	public $pass;
	public $cpass;
	
	function __construct($fname, $email, $pass, $cpass)
	{
		$this->fname = $fname;
		$this->email = $email;
		$this->pass = $pass;
		$this->cpass = $cpass;
	}

	public function signupUser(){
		if ($this->checkEmptyInput() == false) {
			$errmsg='There was an empty input!';
			header('location: ../user/index.php?page=2&errmsg='.$errmsg.'');
            exit();
		}
		if ($this->checkUserData() == false) {
			$errmsg='There was an excisting record!';
			header('location: ../user/index.php?page=2&errmsg='.$errmsg.'');
            exit();
		}
		if ($this->confirmPassword() == false) {
			$errmsg='Password and Confirm Password Not Match!';
			header('location: ../user/index.php?page=2&errmsg='.$errmsg.'');
            exit();
		}
		$this->saveUser($this->fname, $this->email, $this->pass);
	}

	public function checkEmptyInput(){
		$result;
		if (empty($this->fname)  || empty($this->email)  || empty($this->pass)) {
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

	public function checkUserData(){
		$result;
		if (!$this->checkRecord($this->fname, $this->email)) {
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;

	}

	public function confirmPassword(){
		$result;
		if ($this->pass != $this->cpass) {
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
}