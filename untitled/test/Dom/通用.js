//跨浏览器兼容
function getStyle(node,cssStyle){
    return node.currentStyle?node.currentStyle[cssStyle]:getComputedStyle(node)[cssStyle];
}
function elementsByClassName(node,classStr){
//1、获取node这个节点下所有的子节点
    var nodes = node.getElementsByTagName("*");
    var arr = [];//存放符合条件的节点
    for(var i = o; i < nodes.length; i++) {
        if (nodes[i].className === classStr) {
            arr.push(nodes[i]);
        }
    }
        return arr;
    }




function showTime() {
            var d=new Date();
            var year=d.getFullYear();
            var month=d.getMonth()+1;//0~11
            var date=d.getDate();

            var week= d.getDay();//0~6

            week=numOfChinese(week);

            var hour=doubleNum(d.getHours());
            var min=doubleNum(d.getMinutes());
            var sec=doubleNum(d.getSeconds());

            var str =year +"年"+month+"月"+date+"日 星期"+week+""+hour+":"+min+":"+sec
            return str;

        }

        //数字转成中文
        function numOfChinese(num) {
            var arr=["日","一","二","三","四","五","六"]
            return arr[num]
        }

        function doubleNum(n) {
            if (n<10){
                return '0'+n;
            }else {
                return  n;
            }
        }


function randomColor() {
    var str="rgba(" + parseInt(Math.random() * 256)+ "," +parseInt(Math.random() * 256)+ ","+parseInt(Math.random()* 256)+ ",1)";
    return str;
}