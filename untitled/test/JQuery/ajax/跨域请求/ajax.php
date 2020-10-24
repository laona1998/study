<?php
include "Responce.php";
//数据库准备工作
$connectSource=mysqli_connect("LaoNa","root","sql2008","ajax_practice");
mysqli_query($connectSource,"set names UTF8");
//接收传过来的值
$quantity=$_POST['quantity'];


//添加到数据库
$sql="INSERT INTO quantity(quantity) VALUES($quantity)";
$result=mysqli_query($connectSource,$sql);

if($result){
    Responce::json("10001","插入成功","$quantity");
}else{
    Responce::json("-10001","插入失败");
}