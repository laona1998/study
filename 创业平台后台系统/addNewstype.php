<?php
require_once 'admin/server_newsTypes.php';
//var_dump($data[$id]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet"href="../layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">创业平台后台系统</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black ">
        <div class="layui-side-scrol">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree " lay-filter="test">
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">所有用户
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"  onclick="location.href='main.php'">查看用户</a></dd>
                        <dd><a href="javascript:;"  onclick="location.href='addPerson.php'">添加用户</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">新闻管理
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"onclick="location.href='News.php'">查看新闻</a></dd>
                        <dd><a href="javascript:;"onclick="location.href='addNews.php'" lay-id="control"><span class="active">添加新闻</span></a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">分类管理
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"onclick="location.href='NewsType.php'">查看分类</a></dd>
                        <dd class="layui-this"><a href="javascript:;" lay-id="control"><span class="active">添加分类</span></a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="...">
            <h2 style="margin-left: 40px">添加新闻分类</h2>
            <form class="layui-form" method="post" style="margin-left: 40px;width:80%" action="admin/sever_addNewstype.php" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label">现有分类</label>
                    <div class="layui-input-block">
                        <select name="type_id" lay-verify="required">
                            <option value=""></option>
                            <?php
                            foreach ($data1 as $item){
                                echo "<option value='{$item['id']}'>{$item['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">添加分类</label>
                    <div class="layui-input-block">
                        <input type="test" name="name" required lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
                    </div>
                </div>


                <div class="layui-form-item layui-row">
                    <div class="layui-col-xs5 ">
                        <button onclick="history.back()" class="layui-btn layui-btn-primary layui-btn-fluid">取消</button>
                    </div>

                    <div class="layui-col-xs5  layui-col-xs-offset2">
                        <button class="layui-btn layui-btn-fluid" id="btn2" >确认</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>

</body>
    <script src="../layui/layui.js"></script>
    <script type="text/javascript" src="../wangEditor/wangEditor.min.js"></script>

<script>
    layui.use(['element','form','upload','laydate'], function() {
        var element = layui.element;
        var upload = layui.upload;
        var laydate = layui.laydate;
        var $ = layui.$ //重点处
            ,layer = layui.layer;

    });

</script>

</html>