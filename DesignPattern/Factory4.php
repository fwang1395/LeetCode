<?php
//两个接口类
interface Sender{
	function Send($msg);
}

interface Provider{
	function produce();
}

//两个实现类
class MailSender implements Sender{
	function Send($msg){
		echo("MailSender:${msg}");
	}
}

class SmsSender implements Sender{
	function Send($msg){
		echo("send Sms:${msg}");
	}
}

//两个工厂类
class SmsSendFactory implements Provider{
	function produce(){
		return new SmsSender();
	}
}

class MailSendFactory implements Provider{
	function produce(){
		return new MailSender();
	}
}
//测试类
class Test{
	public static function mytest(){
		$provider = new MailSendFactory();
		$sender = $provider->produce();
		$msg = "i am a mail test message;";
		$sender->send($msg);

		$provider = new SmsSendFactory();
		$sender = $provider->produce();
		$msg = "i am a sms test message;";
		$sender->send($msg);
	}
}

Test::mytest();