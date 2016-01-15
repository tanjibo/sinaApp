<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
   function index(){
   	echo json_encode(array('status'=>1,'msg'=>'success'));exit;
   }
}