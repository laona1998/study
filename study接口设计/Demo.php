<?php
require_once '../json.php';
$student=array("name"=>"tom","age"=>11,"height"=>1.70);
Responce::json('1000','ok',$student);




//$jsonArrray=array("code"=>"1000","message"=>"ok","content"=>$student);
//$str=json_encode($jsonArrray);
//echo $str;