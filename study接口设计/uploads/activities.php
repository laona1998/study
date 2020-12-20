<?php

require_once '../sever/json.php';
require_once '../sever/dbhelper.php';


//取得数据
$type=$_REQUEST['type'];
$user=$_REQUEST['userid'];

$pdo=DB::getInstance()->connect();
if ($type=='list'){//获取活动列表
    $result=$pdo->query(
        "select a.*,userid from activity as a left join 
                (SELECT* FROM user_activity WHERE userid=$user) as ua ON a.activityid=ua.activityid");
    $output=array();//所有的活动信息
    if ($result->rowCount()>0){
        while ($r=$result->fetch()){
            $activity=array('activity'=>(int)$r['activityid'],
                'title'=>$r['title'],
                'description'=>$r['description'],
                'createDate'=>$r['create_date'],
                'participants'=>$r['participants'],
                'alreadyInvoled'=>$r['alreadyInvoled'],
                'userId'=>(int)$r['userid']
            );
            array_push($output,$activity);
        }
        Responce::json('10001','活动信息',$output);
    }else{//没有任何活动数据
        Responce::json('10002','没有活动信息');
    }
}else{//参与活动
    //1.确定用户是否已登陆
    $activityid=$_REQUEST['activityid'];
    $token=$_REQUEST['token'];
//    var_dump($token);
    $result=$pdo->query("select * from account where userid=$user and token='$token'");
//    var_dump($result);
    if (!$result){
        Responce::json('-10001','请重新登录');
    }else{
        //2.更新活动列表中已参与的人数
        $result=$pdo->query("update activity set alreadyInvoled=alreadyInvoled+1 where activityid=".$activityid." ");
        if ($result==true){
            //3.在用户与活动关系表中新增一条当前用户的记录
            $result=$pdo->query("insert into user_activity(userid,activityid) values ('$user','$activityid')");
            if ($result==true){
                Responce::json('10001','参与成功');
            }else{
                Responce::json('-10001','参与失败');
            }
        }else{
            Responce::json('-10001','参与失败');
        }
    }

}