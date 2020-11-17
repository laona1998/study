<?php
//echo "hello world";
//echo "Hello "."<br>";
//
////数组
//$arr=[0,1,2];
//print_r($arr);//打印数组
//
////&值传递，函数内部改变变量的内容，不会影响外面变量的内容 // 引用传递：可在函数内部改变外部变量
//$sum=&$sum;
//
//
////引入文件
//include "./project/one.php";
//
//
//$alphe="A,B,C,D";
//$arr= explode(',',$alphe);//字符串->数组
//var_dump($arr);
//
//echo "</br>";
//
//$arr=array("h","j","j","k","o");
//var_dump(implode(",",$arr));//数组->字符串
//
//echo "</br>";
//
////多维数组
//$stu1=array('id'=>1043,"icon"=>'p1.jpg',"name"=>'有头像哥',"age"=>32,"type"=>1);
//$stu2=array('id'=>1050,"icon"=>'p2.jpg',"name"=>'演示数据',"age"=>21,"type"=>2);
//$stu3=array('id'=>1056,"icon"=>'p3.jpg',"name"=>'web2',"age"=>21,"type"=>3);
//$arrs=array($stu1,$stu2,$stu3);
//
////foreach ($stu1 as $key=>$value){
////    echo "{$key}:{$value}<br/>";
////}
//
////方法一
//        echo "<table border='1'>";
//        echo "<tr>
//                <th>编号</th>
//                <th>图像</th>
//                <th>名字</th>
//                <th>年龄</th>
//                <th>类别</th>
//         </tr>";
//        for ($i=0;$i<count($arrs);$i++){
//            echo "</br>";
//        //    echo "用户{$i} 编号:{$arrs[$i]['id']},图像:{$arrs[$i]['icon']},年龄：{$arrs[$i]['age']},类别：{$arrs[$i]['type']}";
//            echo"<tr>
//                <td>{$arrs[$i]['id']}</td>
//                <td><img src='p1.jpg'></td>
//                <td>{$arrs[$i]['name']}</td>
//                <td>{$arrs[$i]['age']}</td>
//                <td>{$arrs[$i]['type']}</td>
//        </tr>";
//        }
//        echo "</table>";
//
// //方法二
//echo "<table align='center' border='1' width=300>";
//echo "<tr>
//        <th>用户</th>
//        <th>图像</th>
//        <th>编号</th>
//        <th>年龄</th>
//        <th>类别</th>
// </tr>";
//foreach($arrs as $row){
//    echo "<tr>";
//    foreach($row as $col){
//        echo "<td>".$col."</td>";
//    }
//    echo "</tr>";
//
//echo "</table>";
//?>
<!---->
<!--//方法三:-->
<!--<table border="1">-->
<!--  <thead>-->
<!--      <tr>-->
<!--          <th>编号</th>-->
<!--          <th>图像</th>-->
<!--          <th>名字</th>-->
<!--          <th>年龄</th>-->
<!--          <th>类别</th>-->
<!--      </tr>-->
<!--  </thead>-->
<!--    <tbody>-->
<!--        --><?php
//           for ($i=0;$i<count($arrs);$i++){
//               echo"<tr>
//                      <td>{$arrs[$i]['id']}</td>
//                       <td><img src='p1.jpg'></td>
//                       <td>{$arrs[$i]['name']}</td>
//                        <td>{$arrs[$i]['age']}</td>
//                        <td>{$arrs[$i]['type']}</td>
//               </tr>";
//      }
//        ?>
<!---->
<!--    </tbody>-->
<!---->
<!--</table>-->

<?php
//字符串格式
$showtime=time()+7*60*60;
echo $showtime=date("Y-m-d H:i:s",$showtime);
echo "<br>";
//时间戳
$current="2020-11-10 08:36:10";
$current=strtotime($current);
echo $current;

?>



