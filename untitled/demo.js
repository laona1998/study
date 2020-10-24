// 实现一个简单的trim函数，用于去除一个字符串，头部和尾部的空白字符
// 假定空白字符只有半角空格、Tab
// 练习通过循环，以及字符串的一些基本方法，分别扫描字符串str头部和尾部是否有连续的空白字符，并且删掉他们，最后返回一个完成去除的字符串
function simpleTrim(str) {
    // your implement
    if (str.charAt(0) == " "||str.charAt(str.length-1)==" ") {//charAt()用于返回指定索引处的字符。索引范围为从 0 到 length() - 1。
        str = str.replace(" ", '');
        str=simpleTrim(str);//递归
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
    return str;

}

// 使用示例
var str = '   hi!  ';
str = trim(str);
console.log(str); // 'hi!'