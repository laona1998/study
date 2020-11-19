<?php
include 'sever.php';

$id=$_POST["id"];
$type_id=$_POST['type_id'];
$user_id=$_POST['user_id'];
$title=$_POST['title'];
$icon=$_POST['img'];
$content=$_POST['content'];

$sql="update news set title='$title',content='$content',img='$icon',type_id=$type_id,user_id=$user_id where id = $id";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('更改成功');location.href='../News.php'</script>";
}