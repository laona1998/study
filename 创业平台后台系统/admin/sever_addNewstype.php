<?php
include 'sever.php';

$name=$_POST['name'];


$create_time=time()+7*60*60;
$create_time=date("Y-m-d H:i:s",$create_time);



$sql="INSERT INTO news_type (name,state,create_time)VALUES ('$name',1,'$create_time')";
$count=$pdo->exec($sql);
//echo $count;
if ($count>=1){
    echo "<script>alert('添加成功');location.href='../NewsType.php'</script>";
}
?>