<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-04 11:53:55
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-13 16:56:45
 */


namespace FanApi\Model;
use Think\Model\RelationModel;

/**
 * 记录表
 */
Class RestaurantRelationModel extends RelationModel{

   protected $tableName = 'restaurant';

   protected $_link = array(    

	  'c' => array(    
		    'mapping_type'      =>  self::MANY_TO_MANY, 
		    'class_name'        =>  'restaurantclass',    
		    'mapping_name'      =>  'c',    
		    'foreign_key'       =>  'restaurant_id',   
		    //'mapping_key'       =>'class_id', 
		    'relation_foreign_key'  =>  'class_id',    
		    'relation_table'    =>  'fjs_restaurant_class'
	     //此处应显式定义中间表名称，且不能使用C函数读取表前缀    
	     ),
	   't' => array(    
		    'mapping_type'      =>  self::MANY_TO_MANY, 
		    'class_name'        =>  'restauranttag',    
		    'mapping_name'      =>  't',    
		    'foreign_key'       =>  'restaurant_id',
		    // 'mapping_key'       =>'tag_id',     
		    'relation_foreign_key'  =>  'tag_id',    
		    'relation_table'    =>  'fjs_restaurant_tag'
	     //此处应显式定义中间表名称，且不能使用C函数读取表前缀    
	     ),
	    //  'c' => array(    
	    // 'mapping_type'  => self::HAS_MANY,    
	    // 'class_name'    => 'restaurant_class',    
	    // 'foreign_key'   => 'restaurant_id',    
	    // 'mapping_name'  => 'c',    
	    // // 'mapping_order' => 'create_time desc',    
	    //  ),   
	    //  't' => array(    
	    // 'mapping_type'  => self::HAS_MANY,    
	    // 'class_name'    => 'restaurant_tag',    
	    // 'foreign_key'   => 'restaurant_id',    
	    // 'mapping_name'  => 't',    
	    // // 'mapping_order' => 'create_time desc',    
	    //  ), 
	    
   );

   	   protected $_auto=array(
	 	   array('c','combineC',1,'callback'),                        
	 	   array('t','combineT',1,'callback'),          
	     array('create_time','time',1,'function'),
	     array('update_time','time',3,'function'),
       array('pic_url','getPic',1,'callback'),
       array('create_uid','getCreateUid',1,'callback')
	 	 
     	);

       public function getCreateUid(){
        if(I('post.user_id')) return I('post.user_id');
       }

       public function getPic(){
        if(I('post.pic_url'))
          return current(I('post.pic_url'));
       }


   	   function combineC(){
   	   	if(I('post.class_id')){
   	   		foreach(I('post.class_id') as $k=>$v){
   	   			$m[$k]['id']=$v;
   	   	    $m[$k]['create_time']=time()+($k+1);
   	   		}
   	   	}else{
   	   		$m=array();
   	   	}
        return $m;
   	   }


   	   function combineT(){
   	   	if(I('post.tag_id')){
   	   		foreach(I('post.tag_id') as $k=>$v){
   	   			$p[$k]['id']=$v;
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
   public function addRestaurant(){

      if($this->create()){
      	  //查找是否有重复餐厅,如果有就获取id
      	  $id=M('restaurant')->where(array('name'=>trim(I('post.name'))))->getField('id');
      	 
      	  if($id){

           if(I('post.class_id')){

		      	  foreach(I('post.class_id') as $k=>$v){
		      	  	//去重复
		      	  	$exsitC=M('restaurant_class')->where(array('restaurant_id'=>$id,'class_id'=>$v))->find();
		      	  	if($exsitC) continue;
		      	  	$classR[]=array('restaurant_id'=>$id,'class_id'=>$v);
		      	  
      	      }
      	   }else{

      	   	$classR[]=array();

      	   }

      	   if(I('post.tag_id')){
         
		      	  foreach(I('post.tag_id') as $k=>$v){
		      	  	//去重复
		      	  	$exsitT=M('restaurant_tag')->where(array('restaurant_id'=>$id,'tag_id'=>$v))->find();
		      	  	if($exsitT) continue;
		      	  	$tagR[]=array('restaurant_id'=>$id,'tag_id'=>$v);
		      	  }
      	   }else{
      	   	$tagR[]=array();
      	   }

      	   

      	   if($classR)
      	   	  M('restaurant_class')->addAll($classR);
      	   if($tagR)
      	   	  M('restaurant_tag')->addAll($tagR);
      	   
    
      	  // if($classR && $tagR){
        
      	  // 	$res=M('restaurant_class')->addAll($classR)&&M('restaurant_tag')->addAll($tagR);
      	  // 	 if(false !== $res)
         //       // 提交事务
         //        $this->commit();
         //        else
         //        // 事务回滚
         //        $this->rollback();
      	  // }

      	  return $id;

         }    
           
      	 if($id=$this->add())
      	 	return $id;
      	 else
          return 0;

      }
   
    }
}