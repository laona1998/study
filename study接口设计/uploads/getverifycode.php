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
//接收请求
$phone=$_REQUEST['telephone'];
//生成验证码
$str='0123456789';
$code="";
$flag=0;
for ($i=0;$i<6;$i++){
    $code.=$str[mt_rand(0,strlen($str)-1)];//随机获取数0~9
}
if ($code){//正常获取
    //json格式
    $phoneArray=array('telephone'=>$phone,'verifyCode'=>$code,'time'=>time());//time;记录验证码生成时间
    //服务器需要保存各个用户取得的验证码
    $allVerifyCode=array();
    if ($_SESSION["VerifyCode"]!=null){
        $allVerifyCode=$_SESSION["VerifyCode"];
    }
    $cnt=count($allVerifyCode);
    for($i=0;$i<$cnt;$i++){
        $p=$allVerifyCode[$i]['telephone'];
        if ($p==$phone){
            $allVerifyCode[$i]['verifyCode']=$code;
            $allVerifyCode[$i]['time']=time();//更新时间
            $flag=1;
            break;
        }
    }
    if ($flag==0){
        array_push($allVerifyCode,$phoneArray);
    }
    $_SESSION['VerifyCode']=$allVerifyCode;

    Responce::json('10001','获取验证码成功',$phoneArray);


}else{//获取失败
    Responce::json('-10001','获取验证码失败');
}