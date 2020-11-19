<?php
include 'sever.php';

$id=$_POST["id"];
$name=$_POST['name'];
$age=$_POST['age'];
$type=$_POST['type'];
$birthday=$_POST['birthday'];

$icon=$_POST['icon'];


$sql="update user set name='$name',age=$age,icon='$icon',type=$type,birthday='$birthday' where id = $id";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('更改成功');location.href='../main.php'</script>";
}