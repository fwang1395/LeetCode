<?php
interface Sender
{
	/**
	 *  interface 关键字来定义接口，但其中定义所有的方法都是空的
	 *  接口中定义的所有方法都必须是公有
	 * @Author   wangfei
	 * @DateTime 2018-10-17T09:48:53+0800
	 * @param    [type]                   $msg [description]
	 * @return   [type]                        [description]
	 */
	public function send($msg);
}

/**
 * 要实现一个接口，使用 implements 操作符
 */
class MailSender implements Sender{
	public function __construct(){
		echo("MailSender construct"."\n\r");
	}
	public function send($msg) {
		echo("MailSender send: {$msg}"."\n\r");
	}
}

class SMSSender implements Sender{
	public function __construct(){
		echo("SMSSender construct"."\n\r");
	}
	public function send($msg){
		echo("SMSSender send: {$msg}"."\n\r");
	}
}

class SendFactory{
	function produce($type){
		if('mail' == $type){
			return new MailSender();
		}
		elseif('sms' == $type){
			return new SMSSender();
		}
		else{
			echo "请输入正确的类型!"."\n\r";
			return null;
		}
	}
}

class FactoryTest{
	function test(){
		$sendFactory = new SendFactory();
		$sender = $sendFactory->produce("mail");
		$sender->send("i send an email");
	}
}

$test = new FactoryTest();
$test->test();