<?php
include 'sever.php';

$type_id=$_POST['type_id'];
$user_id=$_POST['user_id'];
$title=$_POST['title'];
$icon=$_POST['img'];
$content=$_POST['content'];

$create_time=time()+7*60*60;
$create_time=date("Y-m-d H:i:s",$create_time);




$sql="INSERT INTO news(title,content,img,type_id,user_id,create_time)VALUES ('$title','$content','$icon',$type_id,$user_id,'$create_time')";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('添加成功');location.href='../News.php'</script>";
}
?>