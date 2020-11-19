<?php

function json($code=0,$message='',$data=[])
{
    $res=[
        'errno' => $code,
        'message'=>$message,
        'data'=>$data
    ];
    exit(json_encode($res,JSON_UNESCAPED_UNICODE));
}

//var_dump($_FILES);
if (!empty($_FILES['picture'])){
    $file=$_FILES['picture'];
    if ($file['error']==0){
        $imgname=$file['name'];
        move_uploaded_file($file["tmp_name"],"E:/xampp/htdocs/app/project/layui/创业平台后台系统/img/".$imgname);

        json(0,'上传成功',["img/".$imgname]);

    };
}else{
    json(-1,'没有文件');
}

