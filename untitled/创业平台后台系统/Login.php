<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆界面</title>
    <style type="text/css">
        body:before {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            content: '';
            background: #62a8ea;
            background: url(https://yoshop.xany6.com/assets/store/img/login_bg.jpg) center center/cover no-repeat !important;
        }

        #login  {
            width: 260px;
            height: 350px;
            padding: 0 80px;
            opacity: 0.8;

            background-color: white;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }
        #login form{
            margin-top: 40px;
        }
        #login h1{
            color: black;
            margin: 20px;
        }
    </style>
    <link rel="stylesheet"href="../layui/css/layui.css">
</head>
<body class="layui-bg-green">
    <div id="login">
        <h1>后台管理系统</h1>
        <form class="layui-form" method="post" action="admin/sever_Login.php">
            <div class="layui-form-item">
                <input type="text" name="username" class="layui-input" placeholder="请输入用户名">
            </div>
            <div class="layui-form-item">
                <input type="password" name="password" class="layui-input"placeholder="请输入密码" >
            </div>

            <div class="layui-form-item layui-row">
                <div class="layui-col-xs5 ">
                    <button class="layui-btn layui-btn-primary layui-btn-fluid">注册</button>
                </div>

                <div class="layui-col-xs5  layui-col-xs-offset2">
                    <button class="layui-btn layui-btn-fluid">登录</button>

                </div>


            </div>


        </form>
    </div>

</body>
<script src="../layui/layui.js"></script>
</html>