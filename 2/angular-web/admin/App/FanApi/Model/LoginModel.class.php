<?php
/**
 * @Author: [DuCen] <316358726@qq.com>
 * @Date:   2015-12-29 17:13:52
 * @Last Modified by:   [DuCen] <316358726@qq.com>
 * @Last Modified time: 2016-01-04 14:52:11
 */

namespace FanApi\Model;
use Think\Model;

Class LoginModel extends Model{

	protected $tableName = 'user';

	
	/**
	 * [login 用户登录]
	 * @return [type] [description]
	 */
	public function login(){

		$mobile_phone = trim(I('phone_number'));
		$login_pwd = trim(I('user_pwd'));

		if(empty($mobile_phone)){
			render('10091','用户名不能为空');exit();
		}

		$data = M('user')->where(array('mobile_phone'=>$mobile_phone))->find();
		if($data){
			if($login_pwd != $data['login_pwd']){
				render('10091','密码不正确');exit();
			}else{
				unset($data['login_pwd']);
				render('10020','success',$data);exit();
			}
		}else{
			render('10091','用户不存在');
			exit();
		}

	}
	/**
	 * [QQlogin qq登录]
	 */
	public function QQlogin(){
		
		$is_qq_login = M('user_qq')->where(array('uid'=>I('uid')))->find();
		if(!$is_qq_login){
			$this->QQregister();//没有授权过 就去注册
		}else{
			$user_id = $is_qq_login['user_id'];
			$data = M('user')->where(array('user_id'=>$user_id))->find();
			unset($data['login_pwd']);
			render('10020','success',$data);exit();
		}

	}
	/**
	 * [QQregister qq注册添加数据]
	 */
	public function QQregister(){
		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}
		$user_data['nickname'] = I('nickname');//昵称

		if(I('gender')=='女'){
			$user_data['sex'] = 2;//性别
		}elseif (I('gender')=='男') {
			$user_data['sex'] = 1;
		}else{
			$user_data['sex'] = 0;//空
		}
		$user_data['head_url'] = I('figureurl');//头像路径
		$user_data['create_time'] = time();//创建时间

		$user_id = M('user')->add($user_data);//添加user表

		if($user_id){

			$qq_data['uid'] = I('uid');
			$qq_data['city'] = I('city');
			$qq_data['figureurl'] = I('figureurl');
			$qq_data['figureurl_1'] = I('figureurl_1');
			$qq_data['figureurl_2'] = I('figureurl_2');
			$qq_data['figureurl_qq_1'] = I('figureurl_qq_1');
			$qq_data['figureurl_qq_2'] = I('figureurl_qq_2');
			$qq_data['gender'] = I('gender');
			$qq_data['is_lost'] = I('is_lost');
			$qq_data['is_yellow_vip'] = I('is_yellow_vip');
			$qq_data['is_yellow_year_vip'] = I('is_yellow_year_vip');
			$qq_data['level'] = I('level');
			$qq_data['msg'] = I('msg');
			$qq_data['nickname'] = I('nickname');
			$qq_data['province'] = I('province');
			$qq_data['ret'] = I('ret');
			$qq_data['yellow_vip_level'] = I('yellow_vip_level');
			$qq_data['vip'] = I('vip');
			$qq_data['create_time'] = time();
			$qq_data['user_id'] = $user_id;

			$result = M('user_qq')->add($qq_data);//添加qq用户表

			if($result){
				$user_data['user_id'] = $user_id;
				render('10020','success',$user_data);exit();
			}

		}

		render('10091','数据请求失败');exit();


	}

	/**
	 * [WXlogin 微信登录]
	 */
	public function WXlogin(){

		$is_wx_login = M('user_wechat')->where(array('openid'=>I('openid')))->find();

		if(!$is_wx_login){
			$this->WXregister();//没有授权过 就去注册
		}else{
			$user_id = $is_wx_login['user_id'];
			$data = M('user')->where(array('user_id'=>$user_id))->find();
			unset($data['login_pwd']);
			render('10020','success',$data);exit();
		}

	}


	public function WXregister(){

		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}

		$user_data['nickname'] = I('nickname');//昵称
		$user_data['sex'] = I('sex');
		$user_data['head_url'] = I('headimgurl');//头像路径
		$user_data['create_time'] = time();//创建时间

		$user_id = M('user')->add($user_data);//添加user表

		if($user_id){

			$wx_data['openid'] = I('openid');
			$wx_data['unionid'] = I('unionid');
			$wx_data['city'] = I('city');
			$wx_data['country'] = I('country');
			$wx_data['province'] = I('province');
			$wx_data['sex'] = I('sex');
			$wx_data['refresh_token'] = I('refresh_token');
			$wx_data['nickname'] = I('nickname');
			$wx_data['headimgurl'] = I('headimgurl');
			$wx_data['create_time'] = time();
			$wx_data['user_id'] = $user_id;
			$result = M('user_wechat')->add($wx_data);//添加qq用户表

			if($result){
				$user_data['user_id'] = $user_id;
				render('10020','success',$user_data);exit();
			}

		}

		render('10091','数据请求失败');exit();


	}

	/**
	 * [isPhone 是否有手机号]
	 * @return boolean [description]
	 */
	public function isPhone(){
		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}

		$result = M('user')->where(array('mobile_phone'=>I('phone_number')))->find();

		if($result){
			render('10020',1,array('is_exist'=>true));exit();
		}else{
			render('10020',0,array('is_exist'=>flase));exit();
		}

	}

	/**
	 * [forgetPassword 忘记密码]
	 * @return [type] [description]
	 */
	public function resetPassword(){
		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}

		$is_phone = M('user')->where(array('mobile_phone'=>I('mobile_phone')))->find();

		if(!$is_phone){
			render('10091','没有该手机号',array('mobile_phone'=>I('mobile_phone')));
			exit();
		}

		$result = M('user')->where(array('mobile_phone'=>I('mobile_phone')))->save(array('login_pwd'=>I('login_pwd')));

		if($result){
			render('10020','success');exit();
		}else{
			render('10091','error');exit();
		}


	}






}