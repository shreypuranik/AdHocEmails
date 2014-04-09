AdHocEmails
===========

Last updated 9th April 2014

This download contains 2 PHP classes. 

SIMPLE USE: Using the EmailSender class 

Instantiate as below: 

$emailer = new EmailSender(); 

Set up the email subject, body using the methods in the class. 

Add as many email addresses as you need using the add method. 

Send the email by calling $obj->sendMailing(). 

No sanitisation methods used (at present).  

ADVANCED USE (Currently a Work in Progress)

Using the EmailSenderLogger class 

Instantiate as below: 

$emailer = new EmailSenderLogger(); 

Set methods as outlined above 

When sending the emails, this class will log the email recipient email address, and the email title. 

Database schema to be committed in shortly. 




