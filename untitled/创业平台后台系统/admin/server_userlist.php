<?php
include 'sever.php';

$curr=empty($_REQUEST['curr'])?'1':$_REQUEST['curr'];
$per=empty($_REQUEST['per'])?'3':$_REQUEST['per'];

//1 查询
//1)使用query
$stmt=$pdo->query('select * from user');
$count=$stmt->rowCount();
//分页
$sql='select * from user limit '.($curr-1)*$per.','.$per;
$stmt = $pdo->query($sql);
//$stmt = $pdo->query('select * from user limit 0,3');

//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$rows = $stmt->fetchAll(); //获取所有
//
$user=[];
foreach ($rows as $item){
    $type_name='';
    switch ($item['type']){
        case 1:
            $type_name='学生';
            break;
        case 2:
            $type_name='老师';
            break;
        case 3:
            $type_name='工人';
            break;
    }
    $item['type_name']=$type_name;
    array_push($user,$item);
}
