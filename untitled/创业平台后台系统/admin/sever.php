<?php
//1、配置参数
$pd0 = array(
    'dsn' => 'mysql:host=localhost;dbname=myplatform;port=3316;charset=utf8',
    'username' => 'root',
    'password' => '',
);
//连接属性
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
);

//2、连接数据库
try {
    $pdo = new PDO($pd0['dsn'], $pd0['username'], $pd0['password'], $options);
} catch (PDOException $e) {
    die('数据库连接失败:' . $e->getMessage());
}

