<?php

 
/*--------------------------------
功能:		PHP HTTP接口 发送短信
修改日期:	2013-05-08
说明:		http://m.5c.com.cn/api/send/?username=用户名&password=密码&mobile=手机号&content=内容&apikey=apikey
状态:
	发送成功	success:msgid
	发送失败	error:msgid

注意，需curl支持。

返回值											说明
success:msgid								提交成功，发送状态请见4.1
error:msgid								提交失败
error:Missing username						用户名为空
error:Missing password						密码为空
error:Missing apikey						APIKEY为空
error:Missing recipient					手机号码为空
error:Missing message content				短信内容为空
error:Account is blocked					帐号被禁用
error:Unrecognized encoding				编码未能识别
error:APIKEY or password error				APIKEY 或密码错误
error:Unauthorized IP address				未授权 IP 地址
error:Account balance is insufficient		余额不足
error:Black keywords is:党中央				屏蔽词
--------------------------------*/
namespace Common\ComClass;

class SMSUtils{
	protected static $username = 'haibai';		//用户账号
	protected static $password = 'qwer1234';	//密码
	protected static $apikey = 'c83fb1f936b101cfef123fb41459f322';	//密码
	protected static $url = 'http://m.5c.com.cn/api/send/?';
	
	public static function sendSMS($mobile,$content)
	{
		// header("Content-type: text/html; charset=utf-8");
		$post_fields = array
		(
		'username'=>SMSUtils::$username,					//用户账号
		'password'=>SMSUtils::$password,				//密码
		'mobile'=>$mobile,					//号码
		'content'=>$content,				//内容
		'apikey'=>SMSUtils::$apikey,				    //apikey
		);
		// var_dump($post_fields);
		return self::curlSMS(SMSUtils::$url,$post_fields);
	}

	protected function curlSMS($url,$post_fields=array()){
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL,$url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 3600); //60秒 
	        curl_setopt($ch, CURLOPT_HEADER,1);
	        curl_setopt($ch, CURLOPT_REFERER,'http://www.taobaichi.com');
	        curl_setopt($ch,CURLOPT_POST,1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
	        $data = curl_exec($ch);
	        curl_close($ch);
	        $res = explode("\r\n\r\n",$data);
	        return $res[2]; 
	}
	
}

?>