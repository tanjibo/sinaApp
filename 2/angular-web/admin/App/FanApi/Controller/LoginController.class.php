<?php

namespace FanApi\Controller;
use   Think\Controller;

Class LoginController extends Controller{


 function login(){
 	  p($_POST);
 	  setcookie(session_name(),session_id(),time()+3600*2,'/');
 	  session('uid',1);
    echo json_encode(array('status'=>1,'message'=>"登陆成功",'uid'=>1));exit;
 }

}