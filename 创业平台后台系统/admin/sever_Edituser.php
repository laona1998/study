<?php
include 'sever.php';


$id=$_GET["id"];


//1 查询
//1)使用query
$stmt = $pdo->query("select * from user where id=$id");
//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$row = $stmt->fetch();

