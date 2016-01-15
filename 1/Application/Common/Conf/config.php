<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
//  用户名　 :  SAE_MYSQL_USER
// 密　　码 :  SAE_MYSQL_PASS
// 主库域名 :  SAE_MYSQL_HOST_M
// 从库域名 :  SAE_MYSQL_HOST_S
// 端　　口 :  SAE_MYSQL_PORT
// 数据库名 :  SAE_MYSQL_DB
    'DB_TYPE'           =>  'mysql',     // 数据库类型
    'DB_DEPLOY_TYPE'    =>  1,
    'DB_RW_SEPARATE'    =>  true,
    'DB_HOST'           =>  SAE_MYSQL_HOST_M.','.SAE_MYSQL_HOST_S, // 服务器地址
    'DB_NAME'           =>  SAE_MYSQL_DB,        // 数据库名
    'DB_USER'           =>  SAE_MYSQL_USER,    // 用户名
    'DB_PWD'            =>  SAE_MYSQL_PASS,         // 密码
    'DB_PORT'           =>  SAE_MYSQL_PORT,        // 端口
    // 'DB_TYPE'               =>  'mysql',     // 数据库类型
    // 'DB_HOST'               =>  'w.rdc.sae.sina.com.cn:3307', // 服务器地址
    // 'DB_NAME'               =>  'app_qiprince',          // 数据库名
    // 'DB_USER'               =>  'SAE_MYSQL_USER',      // 用户名
    // 'DB_PWD'                =>  'SAE_MYSQL_PASS',          // 密码
    // 'DB_PORT'               =>  'SAE_MYSQL_PORT',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
);