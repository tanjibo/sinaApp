<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
     $data=array('user_name'=>'tanjibo','pwd'=>'tanjibo');
      M('user')->data($data)->add();
      var_dump(M('user')->select());
    }
}