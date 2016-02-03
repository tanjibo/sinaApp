<?php
/**
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-27 10:17:47
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-27 10:41:00
 */
header('Content-Type:text/event-stream;charset=utf-8');
header('Cache-Control:no-cache');
header('Access-Control-Allow-Origin:http://127.0.0.1/');
echo date('Y-m-d H:i:s',time());