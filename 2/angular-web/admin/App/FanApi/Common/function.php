<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2015-12-29 15:07:54
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-04 16:44:45
 */
 function p($value){
 	 dump($value);
 }


 function getConstants(){
$user_constants = get_defined_constants(TRUE);
  p($user_constants['user']);
 }

 /**
 * 生成GUID
 */
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}