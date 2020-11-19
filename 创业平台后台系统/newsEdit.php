<?php
//获取数据
//查询数据
//页面显示
require 'admin/sever_Editnews.php';
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
                        <dd class="layui-this"><a href="javascript:;" lay-id="control"><span class="active">添加新闻</span></a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">分类管理
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"onclick="location.href='NewsType.php'">查看分类</a></dd>
                        <dd><a href="javascript:;"onclick="location.href='addNewstype.php'" lay-id="control"><span class="active">添加分类</span></a></dd>
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
            <h2 style="margin-left: 40px">编辑新闻</h2>
            <form class="layui-form" method="post" style="margin-left: 40px;width:80%" action="admin/sever_updateNews.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id']?>">

                <div class="layui-form-item">
                    <label class="layui-form-label">分类</label>
                    <div class="layui-input-block">
                        <select name="type_id" lay-verify="required">
                            <option <?=$row['type_id']==1?'selected':null ?> value="1">HTML</option>
                            <option <?=$row['type_id']==2?'selected':null ?> value="2">CSS</option>
                            <option <?=$row['type_id']==3?'selected':null ?> value="3">JavaScript</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发布人</label>
                    <div class="layui-input-block">
                        <input  value="<?= $row['user_id']?>" type="test" name="user_id" required lay-verify="required" placeholder="请输入发布人ID" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input value="<?= $row['title']?>" type="test" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图片</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="img">
                        <a href="img/<?= $row['img']?>" target="_blank" >
                            <img class="img2" src="img/<?= $row['img']?>" alt="" style="height: 80px;width: 80px;">
                        </a>
                        <img style="display: none;width: 92px;height: 92px; margin: 0 10px 10px 0;" class="img" src="" alt="" >
                        <button type="button" class="layui-btn" id="test1">上传图片</button>
                    </div>
                </div>
                <br>
                <br>
                <div class="layui-form-item">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="content" id="content">
                        <div id="editor" >
                            <P><?= $row['content']?></P>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-row">
                    <div class="layui-col-xs5 ">
                        <button onclick="history.back()" class="layui-btn layui-btn-primary layui-btn-fluid">取消</button>
                    </div>

                    <div class="layui-col-xs5  layui-col-xs-offset2">
                        <button class="layui-btn layui-btn-fluid" id="btn2">确认</button>
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
        //执行实例
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: 'admin/upload.php' //改成您自己的上传接口
            ,field:'picture'
            , done:function (res) {
                //上传完毕回调
                // console.log(res)
                path=res.data.path
                console.log(path);
                icon=document.querySelector('img.img')
                icon.setAttribute('src','img/'+path);
                icon.style.display='inline-block'

                icon2=document.querySelector('img.img2')
                icon2.style.display='none'

                icon=document.querySelector('input[name=img]')
                icon.value=path;
            }
            ,error: function(){
                //请求异常回调
            }
        });
        laydate.render({
            elem: '#birthday' //指定元素
        });


    });
    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create()
    //获取内容
    document.getElementById('btn2').addEventListener('click', function () {
        // 读取 text
        var text=editor.txt.text()
        document.querySelector('input[name=content]').value=text;
    }, false)



</script>
<!--<script type="text/javascript">-->
<!--    var E = window.wangEditor-->
<!--    var editor = new E('#editor')-->
<!--    // 或者 var editor = new E( document.getElementById('editor') )-->
<!--    editor.create()-->
<!--    //获取内容-->
<!--    document.getElementById('btn2').addEventListener('click', function () {-->
<!--        // 读取 text-->
<!--        var text=editor.txt.text()-->
<!--        document.querySelector('input[name=content]').value=text;-->
<!--    }, false)-->
<!---->
<!--</script>-->
</html>