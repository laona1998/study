<?php
include 'sever.php';

//1 查询
//1)使用query
$stmt = $pdo->query("SELECT * FROM `news_type`WHERE state=1");
//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$data1 = $stmt->fetchAll(); //获取所有
//
