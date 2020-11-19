<?php

//退出登录

session_start();//开启
$_SESSION=null;
session_destroy();//销毁
echo "<script>alert('退出成功');location.href='../Login.php'</script>";
















