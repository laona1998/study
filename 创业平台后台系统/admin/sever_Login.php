<?php
include 'sever.php';
//从登陆页面获取用户输入的用户名以及密码,进行验证

//1.获取数据
//$username=$_POST["username"];
//$password=$_POST["password"];


$username=empty($_REQUEST['username'])?'':$_REQUEST['username'];
$password=empty($_REQUEST['password'])?'3':$_REQUEST['password'];

echo '<pre/>';
$stmt = $pdo->query("select * from admin where username='$username'"); //返回一个PDOStatement对象
//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环
$rows = $stmt->fetch();

//if (empty($admin)){
//    echo "<script> alert(’用户不存在‘); </script>";
//}


$row_count = $stmt->rowCount(); //记录数
if ($row_count>=1){
    echo "<script>alert('登录成功');location.href='../main.php'</script>";
    session_start();
    $_SESSION['username']=$username;
}
else{
    echo "<script>alert('登录失败');location.href='../Login.php'</script>";
}



