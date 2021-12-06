<?php
/**
 * 
 */
class Database
{
	
	protected function connect()
	{
            try {
                $mysqlusername = "root";
                $mysqlpassword = "";
                $con = new PDO('mysql:host=localhost;dbname=todoexam_db', $mysqlusername, $mysqlpassword);
                return $con;
            } catch (PDOException $e) {
                print "Error!:" . $e->$getMessage() ."<br>";
                die();
            }		
	}
}