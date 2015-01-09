<?

/* A very generic and basic Email Sender 
 * class. Requires mail to be installed on 
 * server. 
 * Committed April 2014
 */ 

class EmailSender{

	protected $emailUsers = array(); //an array of email addresses
	protected $emailSubject; 
	protected $emailBody; 
	protected $timestamp; 
	protected $addTime= false;
    protected $useHeaders = false;
    /* Add additional headers */
    protected $headers = "From: Your Tool Name <you@yourdomain.com>";


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


	/* Change the add-time-to-email flag 
	 * using boolean logic 
	 */ 
	function setAddTIme($data){
		$this->addTime = $data; 
	}

	/* Set a previous array as the email Users 
	 */ 
	function setEmailList($data){
		$this->emailUsers = $data; 
	}

	/* Reset the email users list 
	 */ 
	function resetEmailList(){
		$this->emailUsers = array(); 
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
                if($this->useHeaders){
                mail($emailUser, $this->emailSubject, $this->emailBody, $this->headers);
                }
                else {
                    mail($emailUser, $this->emailSubject, $this->emailBody);
                }
            }
		}

	}


}















