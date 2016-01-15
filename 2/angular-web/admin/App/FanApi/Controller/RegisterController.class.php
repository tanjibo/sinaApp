<?php
/**
 * @Author: [DuCen] <316358726@qq.com>
 * @Date:   2015-12-31 11:56:46
 * @Last Modified by:   [DuCen] <316358726@qq.com>
 * @Last Modified time: 2015-12-31 16:57:03
 */

namespace FanApi\Controller;
use   Think\Controller;

Class RegisterController extends AuthController{

	public function register(){
		D('Register')->register();
	}


	/**
	 * [getPhoneCode 获取手机验证码]
	 * @return [type] [description]
	 */
	public function getPhoneCode(){

		D('Register')->getPhoneCode();
				
	}

	/**
	 * [getRegion 获取地区]
	 * @return [type] [description]
	 */
	public function getRegion(){
		D('Register')->getRegion();
	}

	/**
	 * [getRegion 获取城市]
	 * @return [type] [description]
	 */
	public function getCity(){
		D('Register')->getCity();
	}

}