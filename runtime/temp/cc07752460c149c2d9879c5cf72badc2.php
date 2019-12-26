<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"C:\Users\Carry\Desktop\yinhang/application/wap/view/first/my\sign_in.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\requirejs.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\right_nav.html";i:1577156538;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="browsermode" content="application"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- 禁止百度转码 -->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <title>今日签到</title>
    <link rel="stylesheet" type="text/css" href="/public/wap/first/sx/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="/public/wap/first/sx/font/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/public/wap/first/sx/css/style.css" />
    <script type="text/javascript" src="/public/wap/first/sx/js/media.js"></script>
    <script type="text/javascript" src="/public/wap/first/sx/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/public/wap/first/sx/js/iscroll.js"></script>
    <script type="text/javascript" src="/public/static/plug/requirejs/require.js"></script>
<script>
    requirejs.config({
        urlArgs: "v=15615616515616556",
        map: {
            '*': {
                'css': '/public/static/plug/requirejs/require-css.js'
            }
        },
        shim: {
            'iview': {
                deps: ['css!iviewcss']
            },
            'layer': {
                deps: ['css!layercss']
            },
            'ydui': {
                deps: ['css!yduicss']
            },
            'vant': {
                deps: ['css!vantcss']
            },
            'cityselect': {
                deps: ['css!yduicss']
            }
        },
        baseUrl: '//' + location.hostname + '/public/',
        paths: {
            'static': 'static',
            'vue': 'static/plug/vue/dist/vue.min',
            'axios': 'static/plug/axios.min',
            'iview': 'static/plug/iview/dist/iview.min',
            'iviewcss': 'static/plug/iview/dist/styles/iview',
            'lodash': 'static/plug/lodash',
            'layer': 'static/plug/layer/layer',
            'layercss': 'static/plug/layer/theme/default/layer',
            'jquery': 'static/plug/jquery-1.10.2.min',
            'moment': 'static/plug/moment',
            'sweetalert': 'static/plug/sweetalert2/sweetalert2.all.min',
            'helper':'static/plug/helper',
            'store':'/public/wap/first/crmeb/module/store',
            'better-scroll':"static/plug/better-scroll",
            'ydui':"static/plug/ydui/ydui",
            'yduicss':"static/plug/ydui/ydui-px",
            'vant':"static/plug/vant/vant.min",
            'vantcss':"static/plug/vant/vant",
            'cityselect':"static/plug/ydui/cityselect",
            'reg-verify':"static/plug/reg-verify"
        }
    });
</script>
</head>
<body class="red-bg">
<div class="user-singin" id="sign">
    <section>
        <header class="flex">
            <div class="user-count-wrapper flex">
                <p>当前积分</p>
                <p class="count"><?php echo floatval($userInfo['integral']); ?></p>
                <p class="day">签到<?php echo $signCount; ?>天</p>
            </div>
            <div class="sing-in-btn off" v-cloak="" v-if="signed == true">今日已签到</div>
            <div class="sing-in-btn" v-cloak="" v-if="signed == false" @click="goSign">立即签到</div>
        </header>
        <div class="singin-recording">
            <div class="title-bar"><img src="/public/wap/first/sx/images/singin-title-bg.jpg" alt=""></div>
            <div id="scroll" class="list-box">
                <ul>
                    <?php if(is_array($signList) || $signList instanceof \think\Collection || $signList instanceof \think\Paginator): $i = 0; $__LIST__ = $signList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="flex">
                        <div class="left-wrapper">
                            <p>每日签到奖励</p>
                            <span><?php echo date("Y-m-d",$vo['add_time']); ?></span>
                        </div>
                        <i class="right-wrapper">+<?php echo $vo['number']; ?></i>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!-- 商品分类模板 -->
        <div class="template-prolist liked">
            <div class="title-like flex">
                <span class="title-line left"></span>
                <span>新品推荐</span>
                <span class="title-line right"></span>
            </div>
            <ul class="flex">
                <?php if(is_array($goodsList) || $goodsList instanceof \think\Collection || $goodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('store/detail',['id'=>$vo['id']]); ?>">
                        <div class="picture"><img src="<?php echo $vo['image']; ?>"></div>
                        <div class="product-info">
                            <p class="title"><?php echo $vo['store_name']; ?></p>
                            <?php $price = explode('.',$vo['price']); ?>
                            <p class="count-wrapper flex">
                                <span class="price"><i>￥</i><?php echo $price[0]; ?>.<i><?php echo $price[1]; ?></i></span>
                                <span class="count">已售<?php echo $vo['sales']; ?>件</span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </section>
</div>
<?php /*  <section id="right-nav" class="right-barnav" >
      <a class="rb-home" href="<?php echo Url('Index/index'); ?>"></a>
      <a class="rb-car" href="<?php echo Url('Store/cart'); ?>"></a>
      <a class="rb-server" href="<?php echo Url('Service/service_list'); ?>"></a>
  </section>  */ ?>
<section id="right-nav" class="right-menu-wrapper">
    <a class="home" href="<?php echo Url('Index/index'); ?>"></a>
    <a class="buy-car" href="<?php echo Url('Store/cart'); ?>"></a>
</section>


<script>
    $(document).ready(function(){
        requirejs(['vue','store','helper'],function(Vue,store,$h){
           new Vue({
               el:"#sign",
               data:{
                   signed : <?=$signed ? 'true' : 'false'?>
               },
               methods:{
                   goSign:function () {
                       var that = this;
                       store.baseGet($h.U({
                           c:'auth_api',
                           a:'user_sign'
                       }),function (res) {
                            that.signed = true;
                           $h.pushMsg(res.data.msg,function () {
                               location.reload();
                           })
                       });
                   }
               }
           });
        });
        var myScroll = new IScroll('#scroll' , { click: true ,tap: true,scrollbars: 'custom'});
    })
</script>
</body>
</html>