<?php
require 'sever.php';

//分页
$curr=empty($_REQUEST['curr'])?'1':$_REQUEST['curr'];
$per=empty($_REQUEST['per'])?'3':$_REQUEST['per'];


//标题搜索
$str_search='';
if (!empty($_REQUEST['search_title'])){
    $search_title=$_REQUEST['search_title'];
    $str_search=" where title LIKE '%$search_title%'";
}
//分类搜索
if (!empty($_REQUEST['type_id'])){
    $type_id=$_REQUEST['type_id'];
    if (empty($str_search)){
        $str_search=" where type_id = $type_id";
    }else{

        $str_search.=" and type_id = $type_id";
    }
}

//1 查询
//1)使用query
$stmt = $pdo->query("select * from news" . $str_search);
//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$count=$stmt->rowCount();

//分页
$sql='SELECT news.*,news_type.`name` FROM `news` LEFT JOIN news_type ON news.type_id=news_type.id  '.$str_search. ' ORDER BY news.id DESC limit '.($curr-1)*$per.','.$per.'';
$stmt = $pdo->query($sql);

$data = $stmt->fetchAll(); //获取所有
//