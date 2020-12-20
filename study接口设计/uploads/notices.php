<?php

require_once '../sever/json.php';
require_once '../sever/dbhelper.php';

//接收字段：社区公告还是个人公告
$type=$_REQUEST['type'];
$pdo=DB::getInstance()->connect();
//搜集公告信息（从数据库中获取）发送给app端
$output=array();//用于保存符合条件的所有数据
//查询数据库的数据
$result=$pdo->query("select * from notice where type='$type'");
$cnt=$result->rowCount();//获取总条数
if ($cnt>0){
    while ($r=$result->fetch()){
        //获取到的一条数据保存到数组中去
        $notice=array('noticeID'=>(int)$r['noticeid'],
                      'title'=>$r['title'],
                      'description'=>$r['description'],
                      'createDate'=>$r['create_date'],
                      'type'=>(int)$r['type']
            );
        array_push($output,$notice);
    }
    Responce::json('10001','公告信息',$output);
}else{//无数据
    Responce::json('-10001','当前没有相关公告信息');
}