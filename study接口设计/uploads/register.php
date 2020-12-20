<?php
$sid=file_get_contents('register.txt');
if ($sid==null){//session为空
    session_start();
    $sid=session_id();
    file_get_contents('register.txt',$sid);
}else{
    session_id($sid);
    session_start();
}

require_once '../sever/json.php';
require_once '../sever/dbhelper.php';


//1.验证验证码的正确性
//获取传值
$username=$_REQUEST['username'];
$verifycode=$_REQUEST['verifyCode'];
$password=$_REQUEST['pwd'];
$pdo=DB::getInstance()->connect();
//
//var_dump($_SESSION["VerifyCode"]);
$allVerifyCode=array();
if ($_SESSION["VerifyCode"]!=null){
    $allVerifyCode=$_SESSION['VerifyCode'];//从session获取验证码
}
$cnt=count($allVerifyCode);
$flag=0;//用于判断验证码是否正确
for($i=0;$i<$cnt;$i++){
    $p=$allVerifyCode[$i]['telephone'];
    $v=$allVerifyCode[$i]['verifyCode'];
    $t=$allVerifyCode[$i]['time'];
    if ($p==$username && $v==$verifycode)//用于check验证码的正确性
    {
        $flag=1;//验证码正确
        if ($t+3*60<time())//检测验证码是否过期
        {
            $flag=2;//验证码过期
        }
        break;
    }
}
if ($flag==0){
    Responce::json('-10004','验证码错误');
}elseif ($flag==2){
    Responce::json('-10005','验证码过期，请重新获取');
}else{
   // Responce::json('10001','验证码正确');
    //2.用于对用户check,注册用户
    //验证用户是否存在
    $result=$pdo->query('select * from account where telephone='.$username);
//    if (!$result) {
////        printf("Error: %s\n", mysqli_error($conn));
//        exit();
//    }

    if (!$result){
        Responce::json('-1002','用户已存在');
    }else{//用户不存在,可以注册
         //密码加密
         $password=md5($password);
        //2.生成昵称
        $nickname='U'.$username.'er';
        //3.生成token
        $token=substr(md5(time()),0,16);
        //4.插入到数据库中
//        $result=$pdo->query();
        $result="INSERT INTO account(telephone,password,nickname,token) VALUES ('$username','$password','$nickname','$token')";
        $count=$pdo->exec($result);

        if ($count>=1){
            $output=array('username'=>$username,'nickname'=>$nickname,'token'=>$token);
            Responce::json('10001','注册成功',$output);
        }

    }

}

