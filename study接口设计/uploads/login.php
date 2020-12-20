<?php
require_once '../sever/json.php';
require_once '../sever/dbhelper.php';

//从App端取值
$username=$_REQUEST['username'];
$password=$_REQUEST['pwd'];
$pdo=DB::getInstance()->connect();

$password=md5($password);
//判断用户名和密码是否正确
$result=$pdo->query("select * from account where telephone=".$username);
if ($result->rowCount()==0){
    Responce::json('-10001','用户不存在');
}else{
  $arr=$result->fetch();
  if ($arr['telephone']==$username && $arr['password']==$password){
      Responce::json('10001','登录成功');
  }else{
      Responce::json('-10002','密码出错');
  }
}
