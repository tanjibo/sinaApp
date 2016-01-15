<?php
/**
 * @Author: [DuCen] <316358726@qq.com>
 * @Date:   2015-12-31 15:26:40
 * @Last Modified by:   [DuCen] <316358726@qq.com>
 * @Last Modified time: 2016-01-04 11:43:27
 */


namespace FanApi\Model;
use Think\Model;

Class RegisterModel extends Model{

	protected $tableName = 'user';


	public function register(){

		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}
		$data['mobile_phone'] = I('mobile_phone');
		if(!$this->isMobile(I('mobile_phone'))){
			render('10091','手机格式不正确',array('mobile_phone'=>$data['mobile_phone']));exit();
		}

		$is_phone = M('user')->where(array('mobile_phone'=>I('mobile_phone')))->find();
		if($is_phone){
			render('10091','该手机号已经注册过');
			exit();
		}


		$data['login_pwd'] = I('login_pwd');
		$data['province_id'] = I('province_id');
		$data['city_id'] = I('city_id');
		$data['create_time'] = time();
		$result = M('user')->add($data);

		if($result){
			$data['user_id'] = $result;
			unset($data['login_pwd']);
			render('10020','success',$data);exit();
		}else{
			render('10091','注册失败');
			exit();
		}
		
		
	}
	/**
	 * [isMobile 验证手机号]
	 * @param  [type]  $mobile [description]
	 * @return boolean         [description]
	 */
	public function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
	}


	/**
	 * [getPhoneCode 获取短信验证码]
	 * @return [type] [description]
	 */
	public function getPhoneCode(){

		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}

		$phone_number = I('phone_number');

		if(!$phone_number){
			render('10091','参数错误');exit();
		}


		$code = $this->generate_code();

		$msg =$code.'（手机验证码）。工作人员不会向您索要，请勿向任何人泄露。';

		$result = \Common\ComClass\SMSUtils::sendSMS($phone_number,$msg);

		if($result){
			render('10020','success',array('phone_number'=>$phone_number,'check_code'=>$code));exit();
		}else{

			render('10091','error');exit();
		}

	}

	/**
	 * [generate_code 随机数验证码]
	 * @param  integer $length [随机数长度]
	 * @return [type]          [description]
	 */
	public function generate_code($length = 4) {
    return rand(pow(10,($length-1)), pow(10,$length)-1);
	}



	/**
	 * [getRegion 获取地区]
	 * @return [type] [description]
	 */
	public function getRegion(){
 
		$result['list'] = M('region')->where(array('parent_id'=>0))->select();
		$result['count'] = M('region')->where(array('parent_id'=>0))->count();
		render('10020','success',$result);exit();

	}

	/**
	 * [getCity 获取城市]
	 * @return [type] [description]
	 */
	public function getCity(){

		$put = I('put.');
		if(empty($put)){
			render('10091','没有参数');exit();
		}

		$parent_id = I('parent_id');

		if(!$parent_id){
			render('10091','参数错误');exit();
		}


		$result['list'] =M('region')->where(array('parent_id'=>$parent_id))->select();;
		$result['count'] = M('region')->where(array('parent_id'=>$parent_id))->count();
		render('10020','success',$result);exit();
	}
	


}