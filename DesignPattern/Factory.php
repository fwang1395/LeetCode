<?php
interface Sender
{

	public function send($msg);
}

class MailSender implements Sender{
	public function __construct(){
		echo "MailSender construct"."\n\r";
	}
	public function send($msg) {
		echo "MailSender send {$msg}"."\n\r";
	}
}

class SMSSender implements Sender{
	public function __construct(){
		echo "SMSSender construct"."\n\r";;
	}
	public function send($msg){
		echo "SMSSender send {$msg}"."\n\r";;
	}
}

class Factory{
	function produceMail(){
		return new MailSender();
	}

	function produceSMS(){
		return new SMSSender();
	}

}

$factory  = new Factory();
$mail = $factory->produceMail();
$mail->send("mail send test");