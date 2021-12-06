<?php
/**
 * 
 */
class getTask extends Register
{
	public $id;
	
	function __construct($id)
	{
		$this->id = $id;
	}

	public function getspcTask(){
		$this->getTaskfor();
	}

	public function doneTask(){
		$this->fisnishTask($this->id);
	}
	public function removeTask(){
		$this->dltTask($this->id);
	}

	public function editTask(){
		$this->getTaskInfo($this->id);
	}





}