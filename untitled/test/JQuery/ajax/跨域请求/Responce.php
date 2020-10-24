<?php


class Responce
{
    public static function json($code='',$message='',$data=array())
    {
        $result=array(
            'code' => $code,
            'message'=>$message,
            'content'=>$data
        );
    exet(json_encode($result));
    }

}