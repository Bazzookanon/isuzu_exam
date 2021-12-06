<?php
/**
 * 
 */
class updateTask extends Register
{
	public $tasktitle;
	public $description;
	public $id;
	function __construct($tasktitle, $description, $id)
	{
		$this->tasktitle = $tasktitle;
		$this->description = $description;
		$this->id = $id;
	}

	public function saveUpdateTask(){
		$this->UpdateTask($this->tasktitle, $this->description, $this->id);
	}


}