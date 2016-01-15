<?php
namespace FanApi\Controller;
use FanApi\Controller;

/** 
 * 食刻控器
 */
class MealController extends AuthController{

   /**
    * 删除食刻
    * 
    */
   public function delRecord(){
     if(I('post.record_id')){
       $t=M('record')->where(array('record_id'=>I('post.record_id')))->setField('is_del',1);
       if($t)
       	 $this->vendor(1,'success');
       	else
       		$this->vendor(0,M('record')->getError());
     }else{
       $this->vendor(0,'params is false');
     }
   }
  

  /**
   * 是否显示食刻
   * is_open 0/1
   */
  public function showRecord(){
    if(I('post.record_id') && I('post.is_open')){
       $t=M('record')->where(array('record_id'=>I('post.record_id')))->setField('is_open',I('post.is_open'));
       if($t)
       	 $this->vendor(1,'success');
       	else
       		$this->vendor(0,M('record')->getError());
     }else{
       $this->vendor(0,'params is false');
     }
  }

  /**
   * 食刻详情
   */
  public function recordDetails(){

  }

  /**
   * 是否同步
   * is_syn 0/1
   */
  public function isSyn(){
     if(I('post.record_id') && I('post.is_syn')){
       $t=M('record')->where(array('record_id'=>I('post.record_id')))->setField('is_sync_circle_of_friends',I('post.is_syn'));
       if($t)
       	 $this->vendor(1,'success');
       	else
       		$this->vendor(0,M('record')->getError());
     }else{
       $this->vendor(0,'params is false');
     }
  }

   /**
    * 列表
    */
  public function recordList(){

  }

}