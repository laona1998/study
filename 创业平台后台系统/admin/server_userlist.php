<?php
include 'sever.php';

$curr=empty($_REQUEST['curr'])?'1':$_REQUEST['curr'];
$per=empty($_REQUEST['per'])?'3':$_REQUEST['per'];


//年龄搜索
$str_search='';
if (!empty($_REQUEST['search_age'])){
    $search_age=$_REQUEST['search_age'];
    $str_search=" where age LIKE '%$search_age%'";
}
//分类搜索
if (!empty($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if (empty($str_search)){
        $str_search=" where type = $type";
    }else{

        $str_search.=" and type = $type";
    }
}


//1 查询
//1)使用query
$stmt=$pdo->query('select * from user'. $str_search);
$count=$stmt->rowCount();

//分页
$sql='select * from user'.$str_search.' limit  '.($curr-1)*$per.','.$per.'';
$stmt = $pdo->query($sql);
//$stmt = $pdo->query('select * from user limit 0,3');


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
