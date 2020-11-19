<?php
include 'sever.php';

if(empty($_REQUEST['id'])){
    echo '<script>alert("缺少id")</script>';
    return;
}
$id=$_REQUEST['id'];

//$creat_time=;

//$sql="INSERT INTO `user`(name,age,type)VALUES ('$name',$age,$type)";
//$count=$pdo->exec($sql);
//echo $count;


$sql="DELETE FROM `news` WHERE id=$id";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('删除成功');location.href='../News.php'</script>";
}