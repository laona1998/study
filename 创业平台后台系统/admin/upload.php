<?php

function json($code=0,$message='',$data=[])
{
    $res=[
        'code' => $code,
        'message'=>$message,
        'data'=>$data
    ];
    exit(json_encode($res,JSON_UNESCAPED_UNICODE));
}

if (!empty($_FILES['picture'])){
    $file=$_FILES['picture'];
    if ($file['error']==0){
        $imgname=$file['name'];
        move_uploaded_file($file["tmp_name"],"E:/xampp/htdocs/app/project/layui/创业平台后台系统/img/".$imgname);
        $icon=$imgname;
        json(-1,'上传成功',['path'=>$icon]);

    };
}else{
    json(-1,'没有文件');
}

