<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:71:"C:\Users\Carry\Desktop\yinhang/application/wap/view/first/my\index.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\container.html";i:1577156538;s:74:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\head.html";i:1577156538;s:75:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\style.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\requirejs.html";i:1577156538;s:80:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\store_menu.html";i:1577156538;s:74:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\foot.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\right_nav.html";i:1577156538;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta name="browsermode" content="application"/>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- 禁止百度转码 -->
<meta http-equiv="Cache-Control" content="no-siteapp">
<!-- uc强制竖屏 -->
<meta name="screen-orientation" content="portrait">
<!-- QQ强制竖屏 -->
<meta name="x5-orientation" content="portrait">
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="/public/static/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/font/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/css/style.css?2"/>
<script type="text/javascript" src="/public/static/js/media.js"></script>
<script type="text/javascript" src="/public/static/plug/jquery-1.10.2.min.js"></script>

    
    <script type="text/javascript" src="/public/static/plug/wxApi.js"></script>
    <?php
        $wechat_share_img = app\core\util\SystemConfigService::get('wechat_share_img');
        $wechat_share_img = str_replace('\\','/',$wechat_share_img);
    ?>
    <script>
        $jssdk = function(){return <?=\app\core\util\WechatService::jsSdk()?>;}
        window.wechat_share_title="<?=\app\core\util\SystemConfigService::get('wechat_share_title')?>";
        window.wechat_share_synopsis="<?=\app\core\util\SystemConfigService::get('wechat_share_synopsis')?>";
        window.wechat_share_img="<?=$wechat_share_img?>";
        mapleWx($jssdk(), function () {
            this.onMenuShareAll({
                title: wechat_share_title || $('title').text(),
                desc: wechat_share_synopsis || $('title').text(),
                imgUrl: location.origin +wechat_share_img,
                link:location.href,
            });
        });
    </script>
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
    
    <script type="text/javascript" src="/public/wap/first/crmeb/js/common.js"></script>
</head>
<body>

<div class="user">
    <section>
        <header>
            <div class="user-wrapper flex">
                <div class="user-info-wrapper flex">
                    <div class="avatar"><img src="<?php echo $userInfo['avatar']; ?>" /></div>
                    <div class="user-info">
                        <p class="name"><?php echo $userInfo['nickname']; ?></p>
                        <p class="time">注册时间：<?php echo date("Y-m-d",$userInfo['add_time']); ?></p>
                    </div>
                </div>
                <div class="user-btn flex">
                    <a class="icon-mail" href="<?php echo Url('notice'); ?>"><?php if($notice > 0): ?><i><?php echo $notice; ?></i><?php endif; ?></a>
                </div>
            </div>
            <div class="user-price flex">
                <div class="item">
                    <a href="/wap/my/integral.html" style="color: #fff;">
                        <span><?php echo floatval($userInfo['integral']); ?></span>
                        <p>我的积分</p>
                    </a>
                </div>
                <div class="item">
                    <a href="/wap/my/coupon.html" style="color: #fff;">
                    <span><?=\app\wap\model\store\StoreCouponUser::getUserValidCouponCount($userInfo['uid'])?></span>
                    <p>我的优惠券</p>
                    </a>
                </div>
            </div>
        </header>
        <div class="user-orders">
            <?php $orderListUrl = Url('my/order_list'); ?>
            <div class="title flex">
                <i class="iconfont icon-dingdan"></i>
                <span>全部订单</span>
                <a class="flex" href="<?php echo $orderListUrl; ?>">查看全部</a>
            </div>
            <div class="user-orders-list flex">
                <a href="<?php echo $orderListUrl; ?>#0">
                    <?php if($orderStatusNum['noBuy'] > '0'): ?>
                    <i class="mark_num"><?php echo $orderStatusNum['noBuy']>99?99 : $orderStatusNum['noBuy']; ?></i>
                    <?php endif; ?>
                    <img src="/public/wap/first/crmeb/images/user-orders-list001.png" />
                    <p>待付款</p>
                </a>
                 <a href="<?php echo $orderListUrl; ?>#11">
                      <?php if($orderStatusNum['noPink'] > '0'): ?>
                      <i class="mark_num"><?php echo $orderStatusNum['noPink']>99?99 : $orderStatusNum['noPink']; ?></i>
                      <?php endif; ?>
                      <img src="/public/wap/first/crmeb/images/user-orders-list005.png" />
                      <p>团购中</p>
                  </a>
                <a href="<?php echo $orderListUrl; ?>#1">
                    <?php if($orderStatusNum['noPostage'] > '0'): ?>
                    <i class="mark_num"><?php echo $orderStatusNum['noPostage']>99?99 : $orderStatusNum['noPostage']; ?></i>
                    <?php endif; ?>
                    <img src="/public/wap/first/crmeb/images/user-orders-list002.png" />
                    <p>待发货</p>
                </a>
                <a href="<?php echo $orderListUrl; ?>#2">
                    <?php if($orderStatusNum['noTake'] > '0'): ?>
                    <i class="mark_num"><?php echo $orderStatusNum['noTake']>99?99 : $orderStatusNum['noTake']; ?></i>
                    <?php endif; ?>
                    <img src="/public/wap/first/crmeb/images/user-orders-list003.png" />
                    <p>待收货</p>
                </a>
                <a href="<?php echo $orderListUrl; ?>#3">
                    <?php if($orderStatusNum['noReply'] > '0'): ?>
                    <i class="mark_num"><?php echo $orderStatusNum['noReply']>99?99 : $orderStatusNum['noReply']; ?></i>
                    <?php endif; ?>
                    <img src="/public/wap/first/crmeb/images/user-orders-list004.png" />
                    <p>待评价</p>
                </a>
            </div>
        </div>
        <div class="user-service-list flex">
            <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="item">
                <a class="con-cell" href="<?php echo $vo['url']; ?>">
                    <img src="<?php echo unThumb($vo['icon']); ?>" alt="" />
                    <p><?php echo $vo['name']; ?></p>
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; if($statu == 2 || $userInfo['is_promoter'] == 1): ?>
                <div class="item">
                    <a class="con-cell" href="/wap/my/spread_list.html">
                        <img src="/public/uploads/common/5abc5804670d2.png" alt="">
                        <p>我的推广人</p>
                    </a>
                </div>
                <div class="item">
                    <a class="con-cell" href="/wap/index/spread.html">
                        <img src="/public/uploads/common/5abc5816d752b.png" alt="">
                        <p>推广二维码</p>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <div style="height:.92rem;"></div>
<?php
$request = \think\Request::instance();
$now_c = $request->controller();$now_a = $request->action();
$menu = [
    ['c'=>'Index','a'=>'index','name'=>'店铺主页','class'=>'home'],
    ['c'=>'Store','a'=>'category','name'=>'商品分类','class'=>'sort'],
    ['c'=>'Store','a'=>'cart','name'=>'购物车','class'=>'car'],
    ['c'=>'Service','a'=>'service_list','name'=>'联系卖家','class'=>'server'],
    ['c'=>'My','a'=>'index','name'=>'我的','class'=>'user'],
];
?>
<footer class="common-footer flex border-1px" ref="storeMenu" @touchmove.prevent>
    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;        if(strtolower($now_c) == strtolower($vo['c']) && strtolower($now_a) == strtolower($vo['a'])){
            $href = 'javascript:void(0);';
            $checked = true;
        }else{
            $href = Url($vo['c'].'/'.$vo['a']);
            $checked = false;
        }
    ?>
    <a class="<?php echo $vo['class']; if($checked){echo' on ';} ?>" href="<?php echo $href; ?>">
        <span class="footer-icon icon"></span>
        <p><?php echo $vo['name']; ?></p>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</footer>
</div>


<!--crmEb-->
<?php /*  <section id="right-nav" class="right-barnav" >
      <a class="rb-home" href="<?php echo Url('Index/index'); ?>"></a>
      <a class="rb-car" href="<?php echo Url('Store/cart'); ?>"></a>
      <a class="rb-server" href="<?php echo Url('Service/service_list'); ?>"></a>
  </section>  */ ?>
<section id="right-nav" class="right-menu-wrapper">
    <a class="home" href="<?php echo Url('Index/index'); ?>"></a>
    <a class="buy-car" href="<?php echo Url('Store/cart'); ?>"></a>
</section>


</body>
</html>
