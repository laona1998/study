<?php
require 'admin/server_userlist.php'
//
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
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有用户
                    <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd class="layui-this"><a href="javascript:;">查看用户</a></dd>
                        <dd><a href="javascript:;"  onclick="location.href='addPerson.php'">添加用户</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">新闻管理
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"onclick="location.href='News.php'">查看新闻</a></dd>
                        <dd><a href="javascript:;"onclick="location.href='addNews.php'">添加新闻</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">

            <div class="layui-btn-group demoTable">
                <button onclick="location.href='addPerson.php'" type="button" class="layui-btn">
                    <i class="layui-icon">&#xe608;</i> 添加用户
                </button>
            </div>

            <table class="layui-table"lay-filter="demo" style="width: 800px;height: 480px">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>头像</th>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>分类</th>
                    <th>生日</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user as $item)
                    echo"
                    <tr style=\"height: 100px\">
                    <td>{$item['id']}</td>
                    <td><img src=\"img/{$item['icon']}\"></td>
                    <td>{$item['name']}</td>
                    <td>{$item['age']}</td>
                    <td>{$item['type_name']}</td>
                    <td>{$item['birthday']}</td>
                    <td>
                        <a  href='personEdit.php?id={$item['id']}' class=\"layui-btn layui-btn-md\" lay-event=\"edit\">编辑</a>                       
                        <button onclick=\"showDel('{$item['name']}',{$item['id']})\"
                                class=\"layui-btn layui-btn-danger layui-btn-md\">删除
                        </button>
                    </td>
                </tr>                  
                    "
                ?>

                </tbody>
            </table>


            <div id="demo0"></div>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="../layui/layui.js"></script>
<script>
    layui.use(['element','laypage','layer'], function(){
        var element = layui.element;
        var laypage = layui.laypage
        var layer = layui.layer;

//分页
        laypage.render({
            elem: 'demo0'
            ,count: <?=$count ?>//数据总数
            ,limit:3
            ,curr:<?=$curr ?>
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                console.log(obj.limit); //得到每页显示的条数

                //首次不执行
                if(!first){
                    //do something
                    location.href="./main.php?curr="+obj.curr;
                }
            }
        });
    });

    function showDel(name,id){
        layer.confirm('确认删除？'+name+'?', {
            btn: ['确认', '取消'] //可以无限个按钮
        }, function(index, layero){
            //按钮【按钮一】的回调
            // alert(id);
            //页面跳转的方式：访问接口
            location.href='./admin/sever_userdel.php?id='+id;
        }, function(index){
            //按钮【按钮二】的回调
        });
    }



</script>
</body>
</html>