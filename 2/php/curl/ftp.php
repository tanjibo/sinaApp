<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-20 14:12:26
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-20 14:26:34
 */
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,'sftp://192.168.0.1');
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_TIMEOUT,300);
curl_setopt($curl,CURLOPT_USERPWD,'root:123456');
$data=curl_exec($curl);

if(!curl_errno($curl)){
     return $data;
}else{
   echo curl_error($curl);
}
