<?php
return array(
  // 'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
  'DEFAULT_MODULE'        =>  'FanApi',
  ///* 数据库设置 */
  'DB_TYPE'               =>  'mysql',     // 数据库类型
  // 'DB_HOST'               =>  '192.168.0.108', // 服务器地址
  'DB_HOST'               =>  '127.0.0.1', // 服务器地址
  'DB_NAME'               =>  'fjs',          // 数据库名
  // 'DB_NAME'               =>  'fjs',          // 数据库名
  // 'DB_NAME'               =>  'ws',          // 数据库名
  'DB_USER'               =>  'root',      // 用户名
  //'DB_PWD'                =>  'baichiwang@tbc',// 密码
  'DB_PWD'=>'',
  // 'DB_PWD'                =>  '',          // 密码
  'DB_PORT'               =>  '3306',        // 端口
  'DB_PREFIX'             =>  'fjs_',    // 数据库表前缀
  // 'DB_PARAMS'            =>  array(), // 数据库连接参数    
  'DB_DEBUG'        =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
  'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
 
);