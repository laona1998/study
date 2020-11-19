<?php
include 'sever.php';

//$type_id=$_POST['type_id'];
$type_id=1;
$stmt = $pdo->query("select * from news where type_id = $type_id");
$rows = $stmt->fetchAll(); //获取所有

//echo "<script>alert('查询成功');location.href='../NewsSearch.php'</script>";

//
$user=[];
foreach ($rows as $item){
    $type_name='';
    switch ($item['type_id']){
        case 1:
            $type_name='HTML';
            break;
        case 2:
            $type_name='CSS';
            break;
        case 3:
            $type_name='javaScript';
            break;
    }
    $item['type_name']=$type_name;
    array_push($user,$item);
}