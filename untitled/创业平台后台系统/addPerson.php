
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

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有用户
                    <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;"  onclick="location.href='main.php'">查看用户</a></dd>
                        <dd class="layui-this"><a href="javascript:;">添加用户</a></dd>
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
        <div style="...">
            <h2 style="margin-left: 40px">添加用户</h2>
            <form class="layui-form" method="post" style="margin-left: 40px;width: 400px" action="admin/sever_addUser.php" enctype="multipart/form-data">

                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="test" name="name" required lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">年龄</label>
                    <div class="layui-input-block">
                        <input type="test" name="age" required lay-verify="required" placeholder="请输入年龄" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">生日</label>
                    <div class="layui-input-block">
                        <input type="text" id="birthday" name="birthday" required placeholder="请输入生日"  lay-verify="required"autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">分类</label>
                    <div class="layui-input-block">
                        <select name="type" lay-verify="required">
                            <option value=""></option>
                            <option value="1">学生</option>
                            <option value="2">老师</option>
                            <option value="3">工人</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">头像</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="icon">
                        <button type="button" class="layui-btn" id="test1">上传图片</button>
                        <img style="display: none;width: 92px;height: 92px; margin: 0 10px 10px 0;" class="icon" src="" alt="" >
                    </div>
                </div>

                <div class="layui-form-item layui-row">
                    <div class="layui-col-xs5 ">
                        <button onclick="history.back()" class="layui-btn layui-btn-primary layui-btn-fluid">取消</button>
                    </div>

                    <div class="layui-col-xs5  layui-col-xs-offset2">
                        <button class="layui-btn layui-btn-fluid">确认</button>
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
<script>
    layui.use(['element','form','upload','laydate'], function() {
        var element = layui.element;
        var upload = layui.upload;
        var laydate = layui.laydate;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: 'admin/upload.php' //改成您自己的上传接口
            ,field:'picture'
           , done:function (res) {
                //上传完毕回调
                console.log(res)
                path=res.data.path
                icon=document.querySelector('img.icon')
                icon.setAttribute('src','img/'+path);
                icon.style.display='inline-block'

                icon=document.querySelector('input[name=icon]')
                icon.value=path;
            }
            ,error:function () {
                //请求异常回调
            }
        });

        laydate.render({
            elem: '#birthday' //指定元素
        });

    });

</script>
</html>