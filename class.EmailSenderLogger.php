<?
include_once("class.EmailSender.php");
include_once("DB.php"); 

/* Logger class, which builds upon the basic 
 * functionality provided by the main 
 * EmailSender class. Logs email sending 
 * and times. 
 *
 * Uses the PEAR DB files to connect to 
 * MYSQL. Please download this separately
 */

class EmailSenderLogger extends EmailSender{

	function __construct(){
		parent::__construct(); 
       	$this->setDB(); 

	}

	function setDB(){
		$this->db = DB::connect('mysql://'user':'password'@'host'/'database_name'');
	}

	function logEmail($email, $title){
		$this->db->query("INSERT INTO `EmailLogs` (`useremail`, `emailtitle`) VALUES (?, ?)", array($email, $title));
	}



	/* Send the mailing to the email 
	 * addresses in the distribution 
	 * list. 
	 */ 
	function sendMailing(){
		if ((count($this->emailUsers)>0) && $this->emailSubject && $this->emailBody){
			if ($this->addTime){
				//append timestamp logic to the email 
				$additionalString = "\n"; 
				$additionalString .="This emai was sent on ".date('l jS Y', $this->timestamp);
				$this->emailBody .= $additionalString;
			}

			foreach($this->emailUsers as $emailUser){		
				mail($emailUser, $this->emailSubject, $this->emailBody); 
				$this->logEmail($emailUser, $this->emailSubject);
			}
		}

	}
}