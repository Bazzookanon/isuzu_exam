<?php


class Register extends Database
{
	
	protected function checkRecord($fname, $email){
		$query = $this->connect()->prepare('SELECT * FROM tbl_user WHERE name = ? AND email = ?;');

		if (!$query->execute(array($fname, $email))) {
			$query = null;
			header('location: ../User/register.php?error=RetrieveQuery');
			exit();
		}

		$checkData;
		if ($query->rowCount() > 0) {
			$checkData = false;
		}
		else{
			$checkData = true;
		}
		return $checkData;
	}

	protected function saveUser($fname, $email, $pass){
		$query = $this->connect()->prepare('INSERT INTO tbl_user (name, email, password) VALUES (?, ?, ?);');
         
        $p_hash = MD5($pass);

		if (!$query->execute(array($fname, $email, $p_hash))) {
			$query = null;
			header('location: ../user/register.php?error=SaveQuery');
			exit();
		}
		else{
			$getuserdata = $this->connect()->prepare('SELECT * FROM tbl_user WHERE name = ? AND email = ?;');
			if (!$getuserdata->execute(array($fname, $email))) {
				$getuserdata = null;
				header('location: ../user/register.php?error=SaveQuery');
				exit();
			}
			$user = $getuserdata->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['name'] = $user[0]['name'];
			$_SESSION['uid'] = $user[0]['id'];

		}

	}

	protected function verifyUser($email, $pass)
	{
		
		$query = $this->connect()->prepare('SELECT * FROM tbl_user WHERE email = ? AND password = ?;');
         
        $p_hash = MD5($pass);

		if (!$query->execute(array($email, $p_hash))) {
			$query = null;
			header('location: ../user/index.php?page=1&error=ErrorQuery');
			exit();
		}

		$checkData;
		if ($query->rowCount() == 0) {
			$checkData = false;
		}
		else{
			$checkData = true;
			session_start();
			$user = $query->fetchAll(PDO::FETCH_ASSOC);
			 $_SESSION['name'] = $user[0]['name'];
			 $_SESSION['uid'] = $user[0]['id'];
		}
		return $checkData;

	}

	protected function saveTask($tasktitle, $description){

        $query = $this->connect()->prepare('INSERT INTO tbl_task (user_id, task_title, task_description) VALUES (?, ?, ?);');

        if (!$query->execute(array($_SESSION['uid'], $tasktitle, $description))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}



	}

	protected function getTaskfor(){
		$data = array();
		$query = $this->connect()->prepare('SELECT * FROM tbl_task WHERE user_id = ? AND is_deleted = 1 ORDER BY id DESC;');
		if (!$query->execute(array($_SESSION['uid']))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}
		else{
			while ($row = $query->fetchAll()) {
				$data[] = $row;  
			} 
		}

		echo json_encode($data);
	}

	protected function fisnishTask($id){
		$query = $this->connect()->prepare('UPDATE tbl_task SET status= 0 WHERE id = ?;');
		if (!$query->execute(array($id))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}
		else{
			echo 1;
		}
    
	}

	protected function dltTask($id){
		$query = $this->connect()->prepare('UPDATE tbl_task SET is_deleted= 0 WHERE id = ?;');
		if (!$query->execute(array($id))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}
		else{
			echo 1;
		}
    
	}

	protected function checknewTask($tasktitle){
		$query = $this->connect()->prepare('SELECT * FROM tbl_task WHERE task_title = ? AND user_id = ? AND status = ?;');
		if (!$query->execute(array($tasktitle, $_SESSION['uid'], 1))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}
         $checkResult;
		if ($query->rowCount() > 0) {
			$checkResult = false;
		}
		else{
			$checkResult = true;
		}
		return $checkResult;

	}

	protected function getTaskInfo($id){
        $data = array();
		$query = $this->connect()->prepare('SELECT * FROM tbl_task WHERE id = ?;'); 
		if (!$query->execute(array($id))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}
		else{
			while ($row = $query->fetchAll()) {
				$data[] = $row;  
			} 
		}

		echo json_encode($data);  
	}

	protected function UpdateTask($id, $tasktitle, $description){
		$query = $this->connect()->prepare('UPDATE tbl_task SET task_title = ?, task_description = ? WHERE id = ?;');
		if (!$query->execute(array($tasktitle, $description, $id))) {
			$query = null;
			header('location: ../pub/index.php?error=ErrorQuery');
			exit();
		}

		else{
			echo 1;
		}

	}
}