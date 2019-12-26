<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"C:\Users\Carry\Desktop\yinhang/application/admin\view\record\record\chart_score.php";i:1577156537;s:74:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\container.php";i:1577156537;s:75:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\frame_head.php";i:1577156537;s:70:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\style.php";i:1577156537;s:77:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\frame_footer.php";i:1577156537;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(empty($is_layui) || (($is_layui instanceof \think\Collection || $is_layui instanceof \think\Paginator ) && $is_layui->isEmpty())): ?>
    <link href="/public/system/frame/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <?php endif; ?>
    <link href="/public/static/plug/layui/css/layui.css" rel="stylesheet">
    <link href="/public/system/css/layui-admin.css" rel="stylesheet"></link>
    <link href="/public/system/frame/css/font-awesome.min.css?v=4.3.0" rel="stylesheet">
    <link href="/public/system/frame/css/animate.min.css" rel="stylesheet">
    <link href="/public/system/frame/css/style.min.css?v=3.0.0" rel="stylesheet">
    <script src="/public/system/frame/js/jquery.min.js"></script>
    <script src="/public/system/frame/js/bootstrap.min.js"></script>
    <script src="/public/static/plug/layui/layui.all.js"></script>
    <script>
        $eb = parent._mpApi;
        window.controlle="<?php echo strtolower(trim(preg_replace("/[A-Z]/", "_\\0", think\Request::instance()->controller()), "_"));?>";
        window.module="<?php echo think\Request::instance()->module();?>";
    </script>



    <title></title>
    
<style>
    .layui-input-block button{
        border: 1px solid rgba(0,0,0,0.1);
    }
    .layuiadmin-badge, .layuiadmin-btn-group, .layuiadmin-span-color {
        position: absolute;
        right: 15px;
    }
    .layuiadmin-badge {
        top: 50%;
        margin-top: -9px;
        color: #01AAED;
    }
</style>
<script src="/public/static/plug/echarts.common.min.js"></script>

    <!--<script type="text/javascript" src="/static/plug/basket.js"></script>-->
<script type="text/javascript" src="/public/static/plug/requirejs/require.js"></script>
<?php /*  <script type="text/javascript" src="/static/plug/requirejs/require-basket-load.js"></script>  */ ?>
<script>
    var hostname = location.hostname;
    if(location.port) hostname += ':' + location.port;
    requirejs.config({
        map: {
            '*': {
                'css': '/public/static/plug/requirejs/require-css.js'
            }
        },
        shim:{
            'iview':{
                deps:['css!iviewcss']
            },
            'layer':{
                deps:['css!layercss']
            }
        },
        baseUrl:'//'+hostname+'/public/',
        paths: {
            'static':'static',
            'system':'system',
            'vue':'static/plug/vue/dist/vue.min',
            'axios':'static/plug/axios.min',
            'iview':'static/plug/iview/dist/iview.min',
            'iviewcss':'static/plug/iview/dist/styles/iview',
            'lodash':'static/plug/lodash',
            'layer':'static/plug/layer/layer',
            'layercss':'static/plug/layer/theme/default/layer',
            'jquery':'static/plug/jquery/jquery.min',
            'moment':'static/plug/moment',
            'sweetalert':'static/plug/sweetalert2/sweetalert2.all.min'

        },
        basket: {
            excludes:['system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
//            excludes:['system/util/mpFormBuilder','system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
        }
    });
</script>
<script type="text/javascript" src="/public/system/util/mpFrame.js"></script>
    
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">

<div class="layui-fluid">
    <div class="layui-row layui-col-space15"  id="app">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">搜索条件</div>
                <div class="layui-card-body">
                    <div class="layui-row layui-col-space10 layui-form-item">
                        <div class="layui-col-lg12">
                            <label class="layui-form-label">创建时间:</label>
                            <div class="layui-input-block" data-type="data" v-cloak="">
                                <button class="layui-btn layui-btn-sm" type="button" v-for="item in dataList" @click="setData(item)" :class="{'layui-btn-primary':data!=item.value}">{{item.name}}</button>
                                <button class="layui-btn layui-btn-sm" type="button" ref="time" @click="setData({value:'zd',is_zd:true})" :class="{'layui-btn-primary':data!='zd'}">自定义</button>
                                <button type="button" class="layui-btn layui-btn-sm layui-btn-primary" v-show="showtime==true" ref="date_time"><?php echo $year['0']; ?> - <?php echo $year['1']; ?></button>
                            </div>
                        </div>
                        <div class="layui-col-lg12">
                            <div class="layui-input-block">
                                <button @click="search" type="button" class="layui-btn layui-btn-sm layui-btn-normal">
                                    <i class="layui-icon layui-icon-search"></i>搜索</button>
                                <button @click="refresh" type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon layui-icon-refresh" ></i>刷新</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :class="item.col!=undefined ? 'layui-col-sm'+item.col+' '+'layui-col-md'+item.col:'layui-col-sm6 layui-col-md3'" v-for="item in badge" v-cloak="">
            <div class="layui-card">
                <div class="layui-card-header">
                    {{item.name}}
                    <span class="layui-badge layuiadmin-badge" :class="item.background_color">{{item.field}}</span>
                </div>
                <div class="layui-card-body">
                    <p class="layuiadmin-big-font">{{item.count}}</p>
                    <p v-show="item.content!=undefined">
                        {{item.content}}
                        <span class="layuiadmin-span-color">{{item.sum}}<i :class="item.class"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm12">
            <div class="layui-card">
                <div class="layui-card-header">发放积分:</div>
                <div class="layui-card-body layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-btn-container" ref="echarts_list" id="echarts_list" style="height:400px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-sm12">
            <div class="layui-card">
                <div class="layui-card-header">使用积分:</div>
                <div class="layui-card-body layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-btn-container" ref="echarts_use" id="echarts_list" style="height:400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public/system/js/layuiList.js"></script>
<script>
    require(['vue'],function(Vue) {
        new Vue({
            el: "#app",
            data: {
                option: {},
                badge:[],
                dataList: [
                    {name: '全部', value: ''},
                    {name: '今天', value: 'today'},
                    {name: '本周', value: 'week'},
                    {name: '本月', value: 'month'},
                    {name: '本季度', value: 'quarter'},
                    {name: '本年', value: 'year'},
                ],
                data: '',
                title: '全部商品',
                count: 0,
                myChart: {},
                showtime: false,
                limit:20,
            },
            watch: {

            },
            methods: {
                getScoreBadgeList:function(){
                    var that=this;
                    layList.baseGet(layList.U({a:'getScoreBadgeList',q:{data:this.data}}),function (rem) {
                        that.badge=rem.data;
                    });
                },
                getScoreCurve:function(){
                    var that=this;
                    layList.baseGet(layList.U({a:'getScoreCurve',q:{data:this.data,limit:this.limit}}),function (rem) {
                        var dataCurve=that.setoption(rem.data.seriesdata,rem.data.date,rem.data.zoom,true);
                        that.myChart.list.setOption(dataCurve);
                        var dataCurve=that.setoption(rem.data.deduction_seriesdata,rem.data.deduction_date,rem.data.deduction_zoom);
                        that.myChart.use.setOption(dataCurve);
                    });
                },
                setoption:function(seriesdata,xdata,Zoom,isUse){
                    var text=isUse ? '发放积分趋势图':'使用积分趋势图';
                    this.option={
                        title: {text:text,x:'center'},
                        xAxis : [{type : 'category', data :xdata,}],
                        yAxis : [{type : 'value'}],
                        series:[{type:'line',data:seriesdata,markPoint :{
                                data : [
                                    {type : 'max', name: '最大值'},
                                    {type : 'min', name: '最小值'}
                                ]
                            },
                            itemStyle:{
                                color:'#81BCFF'
                            }
                        }
                        ],
                    };
                    if(Zoom!=''){
                        this.option.dataZoom=[{startValue:Zoom},{type:'inside'}];
                    }
                    return  this.option;
                },
                setData:function(item){
                    var that=this;
                    if(item.is_zd==true){
                        that.showtime=true;
                        this.data=this.$refs.date_time.innerText;
                    }else{
                        this.showtime=false;
                        this.data=item.value;
                    }
                },
                refresh:function () {
                    this.data='';
                    this.getScoreBadgeList();
                    this.getScoreCurve();
                },
                search:function(){
                    this.getScoreBadgeList();
                    this.getScoreCurve();
                },
                setChart:function(name,myChartname){
                    this.myChart[myChartname]=echarts.init(name);
                },
            },
            mounted:function () {
                this.setChart(this.$refs.echarts_list,'list');
                this.setChart(this.$refs.echarts_use,'use');
                this.getScoreBadgeList();
                this.getScoreCurve();
                layList.laydate.render({
                    elem:this.$refs.date_time,
                    trigger:'click',
                    eventElem:this.$refs.time,
                    range:true,
                });
            }
        })
    })
</script>




</div>
</body>
</html>
