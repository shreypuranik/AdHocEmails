<?

/* A very generic and basic Email Sender 
 * class. Requires mail to be installed on 
 * server. 
 */ 

class EmailSender{

	protected $emailUsers = array(); //an array of email addresses
	protected $emailSubject; 
	protected $emailBody; 
	protected $timestamp; 

	function __construct(){
		$this->timestamp = time(); 
	}


	/* Set the subject (title) 
	 * of the email 
	 */ 
	function setEmailSubject($data){
		$this->emailSubject = $data; 
	}

	/* Set the body (content)
	 * of the email 
	 */ 
	function setEmailBody($data){
		$this->emailBody = $data; 
	}

	/* Assign a new email address to
	 * the mailing list 
	 */ 
	function addEmailToMailing($data){
		$this->emailUsers[] = $data; 
	}


	/* Send the mailing to the email 
	 * addresses in the distribution 
	 * list. 
	 */ 
	function sendMailing(){
		if ((count($this->emailUsers)>0) && $this->emailSubject && $this->emailBody){
		foreach($this->emailUsers as $emailUser){		
			mail($emailUser, $this->emailSubject, $this->emailBody); 
		}
	}

	}








}








