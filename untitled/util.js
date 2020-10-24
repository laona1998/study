
//判断arr是否为一个数组，返回一个bool值
function isArray(arr){
    return arr instanceof Array;//函数可以判断左边参数是否是右边参数的一个实例！
}
console.log(isArray([]))

// 判断fn是否为一个函数，返回一个bool值
function isFunction(fn) {
    return (typeof fn)==="function";
    // return fn instanceof Function;
}
console.log(isFunction((function () {})))

// 使用递归来实现一个深度克隆，可以复制一个目标对象，返回一个完整拷贝
// 被复制的对象类型会被限制为数字、字符串、布尔、日期、数组、Object对象。不会包含函数、正则对象等
function cloneObject(obj){
    var out;
    if(obj instanceof Array){
        out=[];//初始化对象
        for(var i in obj){
            out[i]=cloneObject(obj[i]);//递归调用
        }
    }else if (obj instanceof Object){
        out={};//初始化对象
        for(var i in obj){
            out[i]=cloneObject(obj[i]);
        }
    }else {
        out=obj;
    }
    return out;
}
// 测试用例：
var srcObj = {
    a: 1,
    b: {
        b1: ["hello", "hi"],
        b2: "JavaScript"
    }
};
var abObj = srcObj;
var tarObj = cloneObject(srcObj);

srcObj.a = 2;
srcObj.b.b1[0] = "Hello";

console.log(abObj.a);
console.log(abObj.b.b1[0]);

console.log(tarObj.a);      // 1
console.log(tarObj.b.b1[0]);    // "hello"



// 对数组进行去重操作，只考虑数组中元素为数字或字符串，返回一个去重后的数组
function uniqArray(arr) {
    // your implement
    var n=[];
    for (var i=0;i<arr.length;i++){
            //如果当前项已经保存到了临时数组，则跳过，否则加入
        if(n.indexOf(arr[i])==-1){
            n.push(arr[i]);
        }
    }
    return n;
    // Array.from(new Set([1, 2, 6, 2, 6, 2, 7]));  // => [1, 2, 6, 7]
}

// 使用示例
var a = [1, 3, 5, 7, 5, 3];
var b = uniqArray(a);
console.log(b); // [1, 3, 5, 7]

// 实现一个简单的trim函数，用于去除一个字符串，头部和尾部的空白字符
// 假定空白字符只有半角空格、Tab
// 练习通过循环，以及字符串的一些基本方法，分别扫描字符串str头部和尾部是否有连续的空白字符，并且删掉他们，最后返回一个完成去除的字符串
function simpleTrim(str) {
    // your implement
    if (str.charAt(0) == " "||str.charAt(str.length-1)==" ") {//charAt()用于返回指定索引处的字符。索引范围为从 0 到 length() - 1。
        str = str.replace(" ", '');
        str=simpleTrim(str);
    }
    return str;
}
// 使用示例
var str = '  hi!  ';
str = simpleTrim(str);
console.log(str); // 'hi!'


// 很多同学肯定对于上面的代码看不下去，接下来，我们真正实现一个trim
// 对字符串头尾进行空格字符的去除、包括全角半角空格、Tab等，返回一个字符串
// 尝试使用一行简洁的正则表达式完成该题目
function trim(str) {
    // your implement
    str=str.replace(/(^\s*)|(\s*$)/g, "");//用于在字符串中用一些字符替换另一些字符，或替换一个与正则表达式匹配的子串。
        //空格开头或者空格结尾
        // ^是开始
        // \s是空白
        // *表示0个或多个
        // |是或者
        // $是结尾
        // g表示全局
    // var reg=/^\s*(.+)\s*$/
    return str;

}

// 使用示例
var str = '   hi!  ';
str = trim(str);
console.log(str); // 'hi!'



// 实现一个遍历数组的方法，针对数组中每一个元素执行fn函数，并将数组索引和元素作为参数传递
function each(arr, fn) {
    // your implement
    for (index in arr) {
        fn(arr[index], index);
    }
}
// 其中fn函数可以接受两个参数：item和index

// 使用示例
var arr = ['java', 'c', 'php', 'html'];
function output(item) {
    console.log(item)
}
each(arr, output);  // java, c, php, html
// 使用示例
var arr = ['java', 'c', 'php', 'html'];
function output(item, index) {
    console.log(index + ': ' + item)
}
    each(arr, output);  // 0:java, 1:c, 2:php, 3:html



// 获取一个对象里面第一层元素的数量，返回一个整数
function getObjectLength(obj) {
    var n=0;
    for(key in obj){
        n++;
    }
    return n;
}

// 使用示例
var obj = {
    a: 1,
    b: 2,
    c: {
        c1: 3,
        c2: 4
    }
};
console.log(getObjectLength(obj)); // 3


// 判断是否为邮箱地址
function isEmail(emailStr) {
    // your implement
    var sReg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
    if ( ! sReg.test(emailStr) )
    {
        alert("Email地址错误！请重新输入。");
        return false;
    }
    alert("输入正确");
    return true;
}
isEmail("1450572102@qq.com");


// 判断是否为手机号
function isMobilePhone(phone) {
    // your implement
        var reg =/^1(3|4|5|7|8|9)\d{9}$/;//表示以1开头，第二位可能是3/4/5/7/8等的任意一个，在加上后面的\d表示数字[0-9]的9位，总共加起来11位结束。
        if(! reg.test(phone))
        {
            alert("手机号码错误！请重新输入！");
            return false;
        }
    alert("输入正确");
    return true;
}
isMobilePhone(13966408834);





