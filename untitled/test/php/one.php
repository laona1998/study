<?php
 header('content-type:text/html;charset="utf-8"');
//php的输出函数
 echo "<h1>hello world</h1>";
 print_r("<h1>hello world</h1>");
// 类似于js中的console.log()
// var_dump(100);
// var_dump("hello");


 //声明变量
//字符串拼接时：用“.”
$username="钢铁侠";
$age=18;
echo "我是".$username.",今年".$age."岁<br/>";
echo "我是{$username},今年{$age}岁<br>";

//函数
function pritnHello(){
    print "Hello world<br>";
}
pritnHello();

//数组
/*
     1、索引数组   下标是数字叫做索引数组
     2、关联数组    (类似于ECMA6的map类型)下标是字符串叫关联数组
     3、全局数组
            $_GET     接收通过get提交过来的所有的数据
            $_POST    接收通过post提交过来的所有的数据
数组中的索引数组和关联数组可以相互结合，结合成多维数组。
数组长度：count($cars)
*/
/*
1.索引数组
$cars=array("大众","别克","宝马");
for ($i=0;$i<count($cars);$i++){
    echo "下标:{$i} ,数据:{$cars[$i]}<br/>";
}*/

/*//2.关联数组
$arr=array("王五"=>"打鱼的","李四"=>"种地的","张三"=>"打猎的");
foreach ($arr as $key=>$value){
    echo "下标:{$key} ,数据:{$value}<br/>";

}*/
