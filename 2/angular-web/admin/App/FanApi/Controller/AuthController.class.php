<?php

namespace FanApi\Controller;
use   Think\Controller;

class AuthController extends Controller{



  // public function _initialize(){
    
  //   if(!isset(session('uid'))){
  //      $this->redirect(U(MODULE_NAME.'/login/index'));
  //   }   

  // }

 /**
  * 公共输出函数
  * @param  string $code    [代码级别] 错误10091 正确10020,参数没有 10021 
  * @param  string $message [信息]
  * @param  string $result  [返回数据]
  */
 public function vendor($code="",$message="",$result=array()){

 	switch ($code) {
 		  case 0:
 			   $code="10091";
 			  break;
 			case 1:
 			   $code="10020";
 		 	  break;
 		 	case 2:
 		 	   $code="10021";
 	}
    echo  json_encode(
    	array(
    		'result'=>$result,
    		'code'=>$code,
    		'message'=>$message
    		)
    	);
 }

}
