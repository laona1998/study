<?php
//生成一个类-json格式化

class Responce
{
    public static function json($code='',$message='',$data=array())
    {
        $result=array(
            'code' => $code,
            'message'=>$message,
            'content'=>$data
        );
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

}