<?php

namespace FanApi\Model;
use Think\Model\RelationModel;

/**
 * 记录表
 */
Class RecordRelationModel extends RelationModel{

   protected $tableName = 'meal_record';

   protected $_link = array(    

	 'v'=>array(            
	    'mapping_type' => self::HAS_ONE,           
	    'class_name'   => 'meal_record_video',            // 定义更多的关联属性
	    'foreign_key'  =>'record_id', 
	    'mapping_name' => 'v',         
	      ),   
	  'p' => array(    
	    'mapping_type'  => self::HAS_MANY,    
	    'class_name'    => 'meal_record_pic',    
	    'foreign_key'   => 'record_id',    
	    'mapping_name'  => 'p',    
	    // 'mapping_order' => 'create_time desc',    
	     ),   
   );

   	   protected $_auto=array(
	 	   array('v','combineV',1,'callback'),                        
	 	   array('p','combineP',1,'callback'),          
	     array('create_time','time',1,'function'),
       array('cover_img','getPic',1,'callback'),
	 	   array('is_del',0)
     	);

       function getPic(){
          if(I('post.pic_url'))
            return current(I('post.pic_url'));
       }

   	   function combineV(){
   	   	if(I('post.video_url')){
   	   		$v['video_url']=I('post.video_url');
   	   	  $v['create_time']=time()+1;
   	   	}else{
   	   		$v=array();
   	   	}
        return $v;
   	   }


   	   function combineP(){
   	   	if(I('post.pic_url')){
   	   		foreach(I('post.pic_url') as $k=>$v){
   	   			$p[$k]['pic_url']=$v;
   	   	    $p[$k]['create_time']=time()+($k+1);
   	   		}
   	   	}else{
   	   		$p=array();
   	   	}
   	   	
   	   	 return $p;
   	   }

   
   /**
    * 添加一条记录
    */
   public function addRecord(){

      if($this->create())
         
       return	$this->add()?1:0;
      
   }

}