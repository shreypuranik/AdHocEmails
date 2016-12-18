<?php
include_once("DB.php"); 



class EmailSenderManager
{

	private $db; 
	private $queryMailTitle; 
	private $queryMailUserEmail; 


	function __construct()
    {
		$this->setDB(); //set the database 
	}



	/* Connect to the database */ 
	function setDB()
    {
		$this->db = DB::connect('mysql://'user':'password'@'host'/'database_name'');
	}

	
	/* Set the title of the suggested email */ 
	function setQueryMailTitle($data)
    {
		$this->queryMailTitle = $data; 
	}

	/* Return the title of the suggested email 
	 * @return string 
	 */ 
	function getQueryMailTitle()
    {
		return $this->queryMailTitle; 
	}

	/* Set the user email you want to query */ 
	function setQueryMailUserEmail($data)
    {
		$this->queryMailUserEmail = $data; 
	}


	/* Get the user email for the sole query 
	 * @return string 
	 */ 
	function getQueryMailUserEmail()
    {
		return $this->queryMailUserEmail; 
	}


	/* Return data for sole user query 
	 * against set title 
	 * @return array 
	 */ 
	function getSoleUserQuery()
    {
		$data = $this->db->getAll("SELECT * FROM `EmailLogs` WHERE `useremail` = ? AND emailtitle = ?", array($this->queryMailUserEmail, $this->queryMailTitle)); 
		return $data; 
	}

	/* Returns data for sole title query 
	 * @return array 
	 */ 
	function getSoleTitleQuery()
    {
		$data = $this->db->getAll("SELECT `useremail` FROM `EmailLogs` WHERE `emailtitle` = ?", array($this->queryMailTitle)); 
		return $data; 
	}

}
