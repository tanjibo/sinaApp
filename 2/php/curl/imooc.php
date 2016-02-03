<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-20 13:25:07
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-20 14:00:21
 */
$data="username=1533954229@qq.com&password=tanjibo825520";
$curl=curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://www.imooc.com/user/login');
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
date_default_timezone_set('PRC');
curl_setopt($curl, CURLOPT_COOKIESESSION, TRUE);
curl_setopt($curl,CURLOPT_COOKIEFILE,'cookiefile');
curl_setopt($curl,CURLOPT_COOKIEJAR,'cookiefile');
curl_setopt($curl,CURLOPT_COOKIE,session_name().'='.session_id());
curl_setopt($curl,CURLOPT_HEADER,0);
//z这样能够让curl支持页面链接跳转
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('application/x-www-form-urlencoded;charset=utf-8','Content-length:'.strlen($data)));
curl_exec($curl);
curl_setopt($curl,CURLOPT_URL,'http://www.imooc.com/space/index');
curl_setopt($curl,CURLOPT_POST,0);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type:text/xml'));
$output=curl_exec($curl);
curl_close($curl);
echo $output;