<?php
namespace FanApi\Controller;
use FanApi\Controller;

/** 
 * 视频管理
 */
class RecordController extends AuthController{

  /**
   *  上传视频
   *  上传大小要更改       php.ini
   *  post_max_size        默认为8M
   *  upload_max_filesize  默认为2M
   *  默认这两
   */
	function uploadVideo(){
		$upload              =     new \Think\Upload();
		$upload->maxSize     =     20*1024*1024 ;                                              // 设置附件上传大小 (3M)
		$upload->exts        =     array('jpg', 'gif', 'png', 'jpeg','mp4','mov','avi');       // 设置附件上传类型
		$upload->savePath    =      '/Uploads/';                                       // 设置附件上传目录
    $upload->rootPath    =      './Public';                                                // 根目录
    //$upload->saveName    =     '';
    $upload->saveName ='GUID'; 
    //echo ini_get('upload_max_filesize');
    // is_dir($upload->rootPath) or mkdir($upload->rootPath,0777,true);
		$info   =   $upload->upload();
		if(!$info) {
		// 上传错误提示错误信息   
     $this->vendor(0,$upload->getError());  
 
	   }else{
           // 上传成功 获取上传文件信息   
            $info=current($info);

            $this->vendor(1,'success',array('video_url'=>ltrim($upload->rootPath,'.').$info['savepath'].$info['savename']));exit;   
            
	    }
    }


	    function uploadHander(){
        $this->display();
	    }
    

      /**
   *  上传视频
   *  上传大小要更改       php.ini
   *  post_max_size        默认为8M
   *  upload_max_filesize  默认为2M
   *  默认这两
   */
  function uploadImg(){
    $upload              =     new \Think\Upload();
    $upload->maxSize     =     20*1024*1024 ;                                              // 设置附件上传大小 (3M)
    $upload->exts        =     array('jpg', 'gif', 'png', 'jpeg','mp4','mov','avi');       // 设置附件上传类型
    $upload->savePath    =      '/Uploads/';                                       // 设置附件上传目录
    $upload->rootPath    =      './Public'; 
    $upload->saveName ='GUID';                                                // 根目录
  
    //echo ini_get('upload_max_filesize');
    // is_dir($upload->rootPath) or mkdir($upload->rootPath,0777,true);
    $info   =   $upload->upload();
    if(!$info) {
    // 上传错误提示错误信息    
        $this->vendor(0,$upload->getError());  
     }else{
// 上传成功 获取上传文件信息 
  
          foreach($info as $k=>$file){ 
                  $picUrlArr[$k]=ltrim($upload->rootPath,'.').$file['savepath'].$file['savename'];    

            }
            $this->vendor(1,'success',array('pic_url'=>$picUrlArr));exit;   
          }
      }


  function addRecord(){
    //需要上传餐厅信息
    if(!$_POST){
         $this->vendor(0,'params is false');
    }
    if(I('post.record_type')==1){
       $_POST['restaurant_id']=D('RestaurantRelation')->relation(true)->addRestaurant();
    }
      $res=D('RecordRelation')->relation(true)->addRecord();
    if($res)
      $this->vendor(1,'addRecord success');
      else
       $this->vendor(0,D('RecordRelation')->getError());
    
     
    // $_POST['record_type']=1;
    // $_POST['amount']=200;
    // $_POST['subject']='hello';
    // $_POST['remark']='fddfd';
    // $_POST['delicious_rating']=4.4;
    // $_POST['longitude']='12313';
    // $_POST['latitude']='3443';
    // $_POST['address']='342';
    // $_POST['is_footprint']=1;
    // $_POST['is_open']=1;
    // $_POST['is_sync_circle_of_friends']=1;
    // $_POST['create_time']='4323422222';
    // $_POST['is_del']=0;
    // $_POST['video_url']="http://www.baidu.com";
    // $_POST['pic_url']=array('ddddd','34333');
    // $_POST['user_id']='22';
    // $_POST['name']="fdfsfdsdf";
    // $_POST['address']='fsdfsdf';
    // $_POST['longitude']='fdsfsd';
    // $_POST['latitude']='fdsfsd';
    // $_POST['class_id']=array(1,3);
    // $_POST['tag_id']=array(1,3);  
  }

  /**
   * 餐厅品类
   */
  function restaurantClass(){
      $class=M('restaurantclass')->field('class_tag,id')->select();
      if($class){
        $this->vendor(1,'success',array('classList'=>$class));
      }else{
        $this->vendor(0,'data is empty');
      }
  }



  /**
   * 餐厅品类
   */
  function restaurantTags(){
    $tag=M('restauranttag')->field('name,id')->select();
      if($tag){
        $this->vendor(1,'success',array('tagsList'=>$tag));
      }else{
        $this->vendor(0,'data is empty');
      }
  }


}