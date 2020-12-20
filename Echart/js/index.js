//立即执行函数
//柱状图1
(function () {
    //实例化对象
    var myChart = echarts.init(document.getElementById('main'));
    //指定配置项和数据
    option = {
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {            // 坐标轴指示器，坐标轴触发有效
                type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        grid: {
            left: '10%',
            right: '22%',
            bottom: '10%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: '直接访问',
                type: 'bar',
                barWidth: '60%',
                data: [10, 52, 200, 334, 390, 330, 220],
                itemStyle: {
                    //修改柱子圆角
                    barBorderRadius:5
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

    //让图表跟随屏幕自适应
    window.addEventListener("resize",function () {
        myChart.resize();
    })
})();


//柱状图2
(function () {
    //实例化对象
    var myChart = echarts.init(document.getElementById('main1'));
    //指定配置项和数据
    option = {
        legend: {
            data: ['2011年', '2012年']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        //不显示x轴的信息
        xAxis:{
            show:false
        },
        yAxis: {
            type: 'category',
            data: ['巴西', '印尼', '美国', '印度', '中国', '世界人口(万)'],
            //不显示y轴的线
            axisLine:{
                show: false
            },
            //不显示可读
            axisTick:{
                show:false
            },
            //设置文字颜色为白色
            axisLable:{
                color:"#fff"
            }
        },
        series: [
            {
                name: '2011年',
                type: 'bar',
                data: [18203, 23489, 29034, 104970, 131744, 630230]
            },
            {
                name: '2012年',
                type: 'bar',
                data: [19325, 23438, 31000, 121594, 134141, 681807]
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
})();
