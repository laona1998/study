<?php
include 'sever.php';

$name=$_POST['name'];
$age=$_POST['age'];
$type=$_POST['type'];
$birthday=$_POST['birthday'];

$icon=$_POST['icon'];

$create_time=time()+7*60*60;
$create_time=date("Y-m-d H:i:s",$create_time);




$sql="INSERT INTO user(name,age,type,birthday,icon,creat_time)VALUES ('$name',$age,$type,'$birthday','$icon','$create_time')";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('添加成功');location.href='../main.php'</script>";
}
?>