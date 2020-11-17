<?php
require 'admin/server_newslist.php'
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet"href="../layui/css/layui.css">
</head>
<body class="layui-layout-body" >
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
                        <dd class="layui-this"><a href="javascript:;" lay-id="control"><span class="active">查看新闻</span></a></dd>
                        <dd><a href="javascript:;" onclick="location.href='addNews.php'">添加新闻</a></dd>
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

<!--                <div class="layui-form-item">-->
<!--                    <label class="layui-form-label">新闻分类</label>-->
<!--                    <div class="layui-input-inline" style="width: 130px;margin-left: 0px;margin-top: 10px">-->
<!--                        <select name="type" lay-verify="required" class="layui-fluid" id="textdemo">-->
<!--                            <option value="">选择分类</option>-->
<!--                            <option value="1">HTML</option>-->
<!--                            <option value="2">CSS</option>-->
<!--                            <option value="3">JavaScript</option>-->
<!--                        </select>-->
<!---->
<!--                    </div>-->
<!--                        <button class="layui-btn" onclick="search()">查询</button>-->
<!--                </div>-->
<!---->
<!--            <form class="layui-form" id="myform" method="post" action="NewsSearch.php" enctype="multipart/form-data">-->
<!--                <input type="hidden" name="type_id">-->
<!--            </form>-->

            <form class="layui-form-item" method="get" action="./News.php">
                <div class="demoTable">
                    搜索标题：
                    <div class="layui-inline">
                        <input class="layui-input" name="search_title" id="demoReload" autocomplete="off" placeholder="请输入查询内容" >
                    </div>
                    <input type="submit" class="layui-btn" value="搜索">
                </div>
            </form>

                <table class="layui-table"lay-filter="demo" style="width: 100%;height: 480px">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>发布日期</th>
                        <th>图片</th>
                        <th>分类</th>
                        <th>发布人</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $item)
                        echo"
                    <tr style=\"height: 100px\">
                    <td>{$item['id']}</td>
                    <td>{$item['title']}</td>
                    <td>{$item['content']}</td>
                    <td>{$item['create_time']}</td>
                    <td><img src=\"img /{$item['img']}\"></td>
                    <td>{$item['name']}</td>
                    <td>{$item['user_id']}</td>
                     <td>
                        <a  href='newsEdit.php?id={$item['id']}' class=\"layui-btn layui-btn-md\" lay-event=\"edit\">编辑</a>
                        <button onclick=\"showDel('{$item['title']}',{$item['id']})\"
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

</body>
<script src="../layui/layui.js"></script>
<script>
    layui.use(['element','laypage','layer','form'], function(){
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
                    location.href="./News.php?curr="+obj.curr;
                }
            }
        });
    });


    function showDel(title,id){
        layer.confirm('确认删除？'+title+'?', {
            btn: ['确认', '取消'] //可以无限个按钮
        }, function(index, layero){
            //按钮【按钮一】的回调
            // alert(id);
            //页面跳转的方式：访问接口
            location.href='./admin/sever_newsdel.php?id='+id;
        }, function(index){
            //按钮【按钮二】的回调
        });
    }
    // function search() {
    //     var index=document.getElementById("textdemo").selectedIndex;
    //     var id=document.getElementById("textdemo").options[index].value;
    //
    //
    //     typeId=document.querySelector('input[name=type_id]')
    //     typeId.value=id;
    //     // typeId.submit();
    //     document.getElementById("myform").submit();
    // }

</script>
</html>