<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkshop',          // 数据库名
    'DB_USER'               =>  'taoshihan',      // 用户名
    'DB_PWD'                =>  'taoshihan1',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ts_',    // 数据库表前缀

    'UPLOAD_MAX_SIZE' => 2000000,//最大上传大小
	'UPLOAD_PATH' => './Uploads/',//文件上传保存路径
	'UPLOAD_EXTS' => array('jpg','jpeg','gif','png'),//文件上传保存路径
);