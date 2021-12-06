<?php
/**
 * 
 */
class taskUser extends Register
{
	public $tasktitle;
	public $description;
	
	function __construct($tasktitle, $description)
	{
		$this->tasktitle = $tasktitle;
		$this->description = $description;
	}

	public function verifiedUser(){
		if ($this->checkTask() == false) {
			$errmsg='Duplicate task not allowed!';
			header('location: ../pub/index.php?errmsg='.$errmsg.'');
            exit();
		}
		$this->saveTask($this->tasktitle, $this->description);
	}

	public function checkTask(){
		$result;
		if ($this->checknewTask($this->tasktitle) == false) {
			$result = false;
		}
		else{
			$result = true;
		}

		return $result;
	}




}