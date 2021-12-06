<?php
/**
 * 
 */
class loginUser extends Register
{
	
	public $email;
	public $pass;
	
	function __construct($email, $pass)
	{
		$this->email = $email;
		$this->pass = $pass;	
	}

	public function login()
	{
		if ($this->checkEmptyInput() == false) {
			$errmsg='Empty Inputs';
			header('location: ../user/index.php?page=1&errmsg='.$errmsg.'');
            exit();
		}
		
		if ($this->verifyUser($this->email, $this->pass)) {
			header('location: ../pub/index.php');
            exit();
		}
		else{
			$errmsg='Invalid Username or Password.';
			header('location: ../user/index.php?page=1&errmsg='.$errmsg.'');
            exit();
		}
	}

	public function checkEmptyInput(){
		$result;
		if (empty($this->email)  || empty($this->pass)) {
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
}