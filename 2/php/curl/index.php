<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-20 10:47:43
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-20 13:21:18
 */

// curl:client URL Libraray Functions;
// 使用URL语法传输数据的命令行工具

$curl=curl_init('http://www.baidu.com');
curl_setopt($curl,CURLOPT_URL,'http://www.baidu.com');
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);  //执行之后不直接打印
$output=curl_exec($curl);
curl_close($curl);;

echo str_replace('百度', '谈际波', $output);