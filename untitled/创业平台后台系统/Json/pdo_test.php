<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 8:51
 */

//参考：https://www.cnblogs.com/52fhy/p/5352304.html

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
try{
    $pdo = new PDO($pd0['dsn'], $pd0['username'], $pd0['password'], $options);
}catch(PDOException $e){
    die('数据库连接失败:' . $e->getMessage());
}

function json($code=0,$message='',$data=[])
{
    $res=[
        'code' => $code,
        'message'=>$message,
        'data'=>$data
    ];
    exit(json_encode($res,JSON_UNESCAPED_UNICODE));
}



echo '<pre/>';

//1 查询

//1)使用query
$stmt = $pdo->query('select * from user'); //返回一个PDOStatement对象

//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$rows = $stmt->fetchAll(); //获取所有
//
//$row_count = $stmt->rowCount(); //记录数
//print_r($rows);
echo '<br>';

json(1,'查询成功',$rows);
////2 新增、更新、删除
////1)普通操作
//$count  =  $pdo->exec("insert into user(username,password,email,area)values('test',111,'te@qq','中国')"); //返回受影响的行数
////echo $pdo->lastInsertId();
////
//$count  =  $pdo->exec("update user set email='web@qq' where id = 10"); //返回受影响的行数
//$count  =  $pdo->exec("delete from  user where id = 9"); //返回受影响的行数
////echo $count;
?>

<?php

?>

