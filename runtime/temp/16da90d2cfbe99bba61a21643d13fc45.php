<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:74:"C:\Users\Carry\Desktop\yinhang/application/wap/view/first/index\index.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\container.html";i:1577156538;s:74:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\head.html";i:1577156538;s:75:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\style.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\requirejs.html";i:1577156538;s:80:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\store_menu.html";i:1577156538;s:74:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\foot.html";i:1577156538;s:79:"C:\Users\Carry\Desktop\yinhang\application\wap\view\first\public\right_nav.html";i:1577156538;}*/ ?>
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
    <title>
<?= \app\core\util\SystemConfigService::get('site_name') ?>
</title>
    <link rel="stylesheet" type="text/css" href="/public/static/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/font/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/css/style.css?2"/>
<script type="text/javascript" src="/public/static/js/media.js"></script>
<script type="text/javascript" src="/public/static/plug/jquery-1.10.2.min.js"></script>

    
<link rel="stylesheet" href="/public/static/plug/swiper/swiper-3.4.1.min.css">
<script type="text/javascript" src="/public/static/plug/swiper/swiper-3.4.1.jquery.min.js"></script>
<script type="text/javascript" src="/public/static/plug/jquery-slide-up.js"></script>
<script type="text/javascript" src="/public/wap/first/crmeb/js/jquery.downCount.js"></script>
<script type="text/javascript" src="/public/wap/first/crmeb/js/car-model.js"></script>
<script type="text/javascript" src="/public/wap/first/crmeb/js/base.js"></script>
<script type="text/javascript" src="/public/wap/first/crmeb/js/lottie.min.js"></script>

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

<div class="page-index" id="app-index">
    <section ref="bsDom">
        <div>

            <!--<div class="search-wrapper">
                <form method="post" @submit.prevent="goSearch">
                    <div class="search-box flex"><input type="text" v-model="keyword" placeholder="商品搜索: 请输入商品关键词"> <a
                            class="index-icon home-btn" href="<?php echo url('my/notice'); ?>">
                            <?php if($notice > '0'): ?> <b class="count-num"><?php echo $notice; ?></b> <?php endif; ?> </a></div>
                </form>
            </div>-->
            <!-- 滑动导航 -->
           <!-- <div class="common-slider-nav" ref="xScroll">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide on"><a href="javascript:void(0);">商城优选</a></li>
                    <li class="swiper-slide"><a href="<?php echo url('store/combination'); ?>"><img src="/public/wap/first/sx/images/pt-bg.png" alt=""></a></li>
                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="swiper-slide"><a href="<?php echo Url('store/index',['cid'=>$vo['id']]); ?>"><?php echo $vo['cate_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>-->
            <?php if(!(empty($banner) || (($banner instanceof \think\Collection || $banner instanceof \think\Paginator ) && $banner->isEmpty()))): ?>
            <div class="banner" ref="banners">
                <ul class="swiper-wrapper">
                    <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="swiper-slide"><a href="<?= empty($vo['url']) ? 'javascript:void(0);' : $vo['url']; ?>">
                            <img src="<?php echo unThumb($vo['pic']); ?>"/> </a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
            <?php endif; if(!(empty($menus) || (($menus instanceof \think\Collection || $menus instanceof \think\Paginator ) && $menus->isEmpty()))): ?>
            <div class="nav">
                <ul class="flex"> <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?= empty($vo['url']) ? 'javascript:void(0);' : $vo['url']; ?>"> <img src="<?php echo unThumb($vo['icon']); ?>">
                            <p><?php echo $vo['name']; ?></p></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endif; if(!(empty($roll_news) || (($roll_news instanceof \think\Collection || $roll_news instanceof \think\Paginator ) && $roll_news->isEmpty()))): ?>
            <div class="hot-txt-roll border-1px flex">
                <div class="hot-icon"><img src="/public/wap/first/crmeb/images/hot-icon.png"></div>
                <div class="txt-list">
                    <ul class="line"> <?php if(is_array($roll_news) || $roll_news instanceof \think\Collection || $roll_news instanceof \think\Paginator): $i = 0; $__LIST__ = $roll_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><a
                                style="display: block;"
                                href="<?= empty($vo['url']) ? 'javascript:void(0);' : $vo['url']; ?>"><?php echo $vo['info']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <div class="coupon-wrapper" v-cloak="" v-show="couponList.length > 0" style="overflow:hidden;">
                <!--<div ref="xCoupon">-->
                <!-- 已使用 typethree -->
                    <div class="coupon-list">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide coupon-item  flex" v-for="item in couponList"
                                 :class="[(isValidCoupon(item) && !item.is_use) ? 'typeone' : 'typethree']">
                                <div class="count-num flex"><em><i class="small-symbol">￥</i>{{item.coupon_price}}</em>
                                    <p>满{{item.use_min_price}}元可用</p></div>
                                <div class="count-btn flex" v-text="isValidCoupon(item) ? (item.is_use !== true ? '点击领取' : '您已领取') : '已经领完' "
                                     @click="isValidCoupon(item) && item.is_use !== true && userGetCoupon(item)"></div>
                            </div>
                        </div>
                    </div>
                <!--</div>-->
                <a class="more-wrapper" href="<?php echo Url('store/issue_coupon'); ?>" v-show="couponList.length >= 2">查看更多 ></a>
            </div>
            <!-- 商品精品推荐模板 -->
            <div class="template-prolist" v-show="is_bestList.length > 0" >
                <div class="title-like flex" v-cloak=""><span class="title-line left"></span> <span class="icon"></span>
                    <span>精品推荐</span> <span class="title-line right"></span></div>
                <ul class="flex">
                    <li v-for="item in is_bestList" v-cloak=""><a :href="'/wap/store/detail/id/'+item.id">
                        <div class="picture"><img :src="item.image"></div>
                        <div class="product-info"><p class="title" v-text="item.store_name"></p>
                            <p class="count-wrapper flex"><span class="price" v-html="getPriceStr(item.price)"></span> <span
                                    class="count">已售{{item.sales}}{{item.unit_name || '件'}}</span></p></div>
                    </a></li>
                </ul>
            </div>
            <!-- 商品新品推荐模板 -->
            <div class="template-prolist" v-show="is_newList.length > 0">
                <div class="title-like flex"  v-cloak=""><span class="title-line left"></span> <span class="icon"></span>
                    <span>首发新品</span> <span class="title-line right"></span></div>
                <ul class="flex">
                    <li v-for="item in is_newList" v-cloak=""><a :href="'/wap/store/detail/id/'+item.id">
                        <div class="picture"><img :src="item.image"></div>
                        <div class="product-info"><p class="title" v-text="item.store_name"></p>
                            <p class="count-wrapper flex"><span class="price" v-html="getPriceStr(item.price)"></span> <span
                                    class="count">已售{{item.sales}}{{item.unit_name || '件'}}</span></p></div>
                    </a></li>
                </ul>
            </div>
            <!-- 商品热卖推荐模板 -->
            <div class="template-prolist"  v-show="is_hotList.length > 0">
                <div class="title-like flex" v-cloak=""><span class="title-line left"></span> <span class="icon"></span>
                    <span>热卖单品</span> <span class="title-line right"></span></div>
                <ul class="flex">
                    <li v-for="item in is_hotList" v-cloak=""><a :href="'/wap/store/detail/id/'+item.id">
                        <div class="picture"><img :src="item.image"></div>
                        <div class="product-info"><p class="title" v-text="item.store_name"></p>
                            <p class="count-wrapper flex"><span class="price" v-html="getPriceStr(item.price)"></span> <span
                                    class="count">已售{{item.sales}}{{item.unit_name || '件'}}</span></p></div>
                    </a></li>
                </ul>
            </div>
            <!-- 商品促销推荐模板 -->
            <div class="template-prolist"  v-show="is_benefitList.length > 0">
                <div class="title-like flex" v-cloak=""><span class="title-line left"></span> <span class="icon"></span>
                    <span>特价专区</span> <span class="title-line right"></span></div>
                <ul class="flex">
                    <li v-for="item in is_benefitList" v-cloak=""><a :href="'/wap/store/detail/id/'+item.id">
                        <div class="picture"><img :src="item.image"></div>
                        <div class="product-info"><p class="title" v-text="item.store_name"></p>
                            <p class="count-wrapper flex"><span class="price" v-html="getPriceStr(item.price)"></span> <span
                                    class="count">已售{{item.sales}}{{item.unit_name || '件'}}</span></p></div>
                    </a></li>
                </ul>
            </div>
          <!-- 秒杀列表 -->
            <?php if(!(empty($storeSeckill) || (($storeSeckill instanceof \think\Collection || $storeSeckill instanceof \think\Paginator ) && $storeSeckill->isEmpty()))): ?>
            <div class="hotspike-list">
                <div class="index-common-title border-1px">限时秒杀 <a href="<?php echo Url('store/seckill_index'); ?>"><i class="icon"></i></a></div>
                <ul>
                    <?php if(is_array($storeSeckill) || $storeSeckill instanceof \think\Collection || $storeSeckill instanceof \think\Paginator): $i = 0; $__LIST__ = $storeSeckill;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="flex">
                        <div class="picture"><img src="<?php echo $vo['image']; ?>" alt="">
                            <div class="count-down flex countdown" data-time="<?php echo date('Y/m/d H:i:s',$vo['stop_time']); ?>">
                                <span class="days">00</span>
                                <em>:</em>
                                <span class="hours">00</span>
                                <em>:</em>
                                <span class="minutes">00</span>
                                <em>:</em>
                                <span class="seconds">00</span>
                            </div>
                        </div>
                        <div class="text-info flex">
                            <div class="title"><?php echo $vo['title']; ?></div>
                            <div class="price-wrapper"><span class="price"><i>￥</i><?php echo $vo['price']; ?></span> <span class="old-price">￥<?php echo $vo['ot_price']; ?></span>
                            </div>
                            <div class="schedule flex">

                                <span>已抢<?php echo $vo['round']; ?>%</span>
                                <span class="schedule-bar"  ><i class="schedule-weight" data-width="<?php echo $vo['round']; ?>%"></i></span></div>
                            <a class="link" href="<?php echo url('store/seckill_detail',['id'=>$vo['id']]); ?>">马上抢</a></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="buyspell-list" v-cloak="" v-show="combinationList.length > 0">
                <div class="index-common-title border-1px">
                    <span class="color-red">拼团 . </span>花少钱买好货 <i class="icon" @click="window.location.href='<?php echo url('store/combination'); ?>'"></i>
                </div>
                <div class="product-banner"><img src="<?php echo $pinkImage; ?>"></div>
                <div class="bslist-box">
                    <div class="bs-item flex" v-for="item in combinationList">
                        <div class="picture">
                            <img :src="item.image">
                        </div>
                        <div class="bs-item-info flex">
                            <div class="info-title">{{item.title}}</div>
                            <div class="count-wrapper">
                                <span class="price">￥{{item.price}}</span>
                                <span class="old-price">￥{{item.product_price}}</span>
                                <span class="count">已拼{{item.sales}}单</span>
                            </div>
                            <a class="people-num flex">
                                <span class="numbers">{{item.people}}人团</span>
                                <span class="peo-txt" @click="window.location.href='<?php echo url('store/combination_detail',[],false); ?>/id/'+item.id">去开团</span>
                                <i class="index-icon people-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 商品分类模板 -->
            <div class="template-prolist" v-cloak="" v-for="item in cateGroupList" v-show="cateGroupList.length > 0">
                <div class="index-common-title border-1px">
                    <a :href="'/wap/store/index/cid/'+item.id">
                        {{item.cate_name}} <i class="icon"></i> </a></div>
                <div class="product-banner"><img :src="unThumb(item.pic)" v-show="item.pic != ''"></div>
                <ul class="flex">
                    <li v-for="pro in item.product"><a :href="'/wap/store/detail/id/'+pro.id">
                            <div class="picture"><img :src="pro.image"></div>
                            <div class="product-info"><p class="title" v-text="pro.store_name"></p>
                                <p class="count-wrapper flex"><span class="price"
                                                                    v-html="getPriceStr(pro.price)"></span> <span
                                        class="count">已售{{pro.sales}}{{pro.unit_name || '件'}}</span></p></div>
                        </a></li>
                </ul>
            </div>
            <!-- 商品分类模板 -->
            <div class="template-prolist">
                <div class="title-like flex" v-show="page.list.length > 0" v-cloak=""><span class="title-line left"></span> <span class="icon"></span>
                    <span>新品推荐</span> <span class="title-line right"></span></div>
                <ul class="flex">
                    <li v-for="item in page.list" v-cloak=""><a :href="'/wap/store/detail/id/'+item.id">
                            <div class="picture"><img :src="item.image"></div>
                            <div class="product-info"><p class="title" v-text="item.store_name"></p>
                                <p class="count-wrapper flex"><span class="price"
                                                                    v-html="getPriceStr(item.price)"></span> <span
                                        class="count">已售{{item.sales}}{{item.unit_name || '件'}}</span></p></div>
                        </a></li>
                </ul>
            </div>
            <p class="loading-line" v-show="loading == true"><i></i><span>正在加载中</span><i></i></p>
            <p class="loading-line" v-show="loading == false && page.loaded == false" v-cloak="" @click="getList">
                <i></i><span>点击加载</span><i></i></p>
            <p class="loading-line" v-show="loading == false && page.loaded == true" v-cloak="">
                <i></i><span>没有更多了</span><i></i></p></div>
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
<div class="flex" id="bubble-txt" style="display: none;">
    <div class="avatar">
        <img src="" alt="" class="avater-pink">
    </div>
    <span class="nickname"></span>
</div>
<div class="lottie-bg">
    <div id="lottie"></div>
</div>

<script type="text/javascript">
    function loadCRMEB() {
        var anim;
        var elem = document.getElementById('lottie');
        var animData = {
            container: elem,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            rendererSettings: {
                progressiveLoad: false,
                imagePreserveAspectRatio: 'xMidYMid meet'
            },
            path: '/public/wap/first/crmeb/js/animation.json'
        };
        anim = lottie.loadAnimation(animData);
        anim.setSubframe(false);
        setTimeout(
            function () {
                $('.lottie-bg').hide();
            }, 2000)

    }
    if(!window.name) {
        loadCRMEB();
        window.name = "CRMEB";
    }else{
        $('.lottie-bg').hide();
    }
    var base = new Base64();

    (function () {
       var $pinkListUser = <?php echo json_encode($storePink);?>;
       if($pinkListUser.length > 0){
           var $i = 0,dom = $('#bubble-txt'),src = $('.avater-pink'),name = $('.nickname'),pinkShow = function (item) {
                src.attr('src',item['src']);
                name.html(item['nickname']);
                dom.show().addClass('bubble-txt');
                setTimeout(function () {
                    dom.hide().removeClass('bubble-txt');
                },5100);
           },si = setInterval(function () {
               if(document.readyState=="complete"){
                   window.clearInterval(si);
                   pinkShow($pinkListUser[$i++]);
                   setInterval(function () {
                       if($pinkListUser.length <= $i) $i = 0;
                       pinkShow($pinkListUser[$i++]);
                   },6500);
               }
           },500);
       }
        requirejs(['vue', 'store', 'helper', 'better-scroll'], function (Vue, storeApi, $h, BScroll) {
            new Vue({
                el: '#app-index',
                data: {
                    couponList: [],
                    cateGroupList: [],
                    is_bestList: [],//精品推荐
                    is_newList:[],//首发新品
                    is_hotList: [],//热卖单品
                    is_benefitList:[],//促销
                    page: {first: 0, limit: 20, list: [], loaded: false},
                    loading: false,
                    scroll: null,
                    keyword: '',
                    gettingCoupon: false,
                    combinationList:[],
                    pinkData:{
                        src:'',
                        nickname:''
                    },
                    isPinkOne:false
                },
                methods: {
                    unThumb:function(src){
                        return src.replace('/s_','/');
                    },
                    formatPrice: function (price) {
                        var format = price.toString().split('.');
                        if (format[1] == undefined) format[1] = '00';
                        if (format[1].length == 1) format[1] += '0';
                        return format;
                    },
                    getPriceStr: function (price) {
                        var format = this.formatPrice(price);
                        return "<i>￥</i>" + format[0] + "<i>." + format[1] + "</i>";
                    },
                    userGetCoupon: function (coupon) {
                        if (this.gettingCoupon) return;
                        this.gettingCoupon = true;
                        var that = this;
                        storeApi.goLogin() && storeApi.userGetCoupon(coupon.id, function () {
                            coupon.is_use = true;
                            $h.pushMsgOnce('领取成功!');
                            setTimeout(function () {
                                that.gettingCoupon = false;
                            }, 300);
                        }, function () {
                            setTimeout(function () {
                                that.gettingCoupon = false;
                            }, 300);
                            return true;
                        });
                    },
                    isValidCoupon: function (coupon) {
                        return !(coupon.total_count > 0 && coupon.remain_count == 0);
                    },
                    goSearch: function () {
                        if (!this.keyword) return;
                        location.href = $h.U({c: 'store', a: 'index', p: {keyword:  base.encode(this.keyword)}});
                    },
                    getIssueCouponList: function () {
                        var that = this;
                        storeApi.getIssueCouponList(4, function (res) {
                            that.couponList = res.data.data;
                            that.$nextTick(function () {
                                var sliderProduct = new Swiper('.coupon-list', { freeMode: true, freeModeMomentumRatio: 0, slidesPerView: 'auto', });
                            })
                        });
                    },
                    getCateData: function () {
                        var that = this;
                        storeApi.getCategoryProductList(4, function (res) {
                            that.cateGroupList = res.data.data;
//                            that.$nextTick(function () {
//                                that.scroll.refresh();
//                            })
                        })
                    },
                    getCombinationList:function () {
                        var that = this;
                        storeApi.baseGet($h.U({
                            c:"public_api",
                            a:"get_pink_host",
                            p:{limit:2}
                        }),function (res) {
                            that.combinationList = res.data.data;
//                            that.$nextTick(function () {
//                                that.scroll.refresh();
//                            })
                        })
                    },
                    elInit: function () {
                        that = this;
                        if(this.$refs.banners){
                            var liDom = $(this.$refs.banners).find('li');
                            if(liDom.length > 0 ){
                                liDom.width(document.body.offsetWidth);
                                $(this.$refs.banners).find('ul').width((document.body.offsetWidth * liDom.length)+'px');
                                var myBanner = new Swiper('.banner', {
                                    pagination: '.swiper-pagination',
                                    paginationClickable: false,
                                    autoplay: 4500,
                                    loop: true,
                                    speed: 2500,
                                    autoplayDisableOnInteraction: false
                                });
                            }
                        }
                        $('.schedule-weight').each(function() {
                            var _this = $(this);
                            var width =  _this.attr('data-width');
                            _this.css("width",width);
                        });
                        $('.countdown').each(function () {
                            var _this = $(this);
                            var count = _this.attr('data-time');
                            _this.downCount({date: count, offset: +8});
                        });
                        $(".line").slideUp({"li_h": $('.txt-list').height()});
                    },
                    getList: function () {
                        if (this.loading) return;
                        var that = this, group = that.page;
                        if (group.loaded) return;
                        this.loading = true;
                        storeApi.getBestProductList({first: group.first, limit: group.limit}, function (res) {
                            var list = res.data.data;
                            group.loaded = list.length < group.limit;
                            group.first += list.length;
                            group.list = group.list.concat(list);
                            that.$set(that, 'page', group);
                            that.loading = false;
//                            that.$nextTick(function () {
//                                if (list.length) that.scroll.refresh();
//                                that.scroll.finishPullUp();
//                            });
                        }, function () {
                            that.loading = false
                        });
                    },
                    getproductList: function (type) {
                        var that = this;
                        storeApi.getPublicProductList({first:0, limit: 4,type:type}, function (res) {
                            if(type=='is_best')
                                that.is_bestList = res.data.data;
                            if(type=='is_hot')
                                that.is_hotList = res.data.data;
                            if(type=='is_new')
                                that.is_newList = res.data.data;
                            if(type=='is_benefit')
                                that.is_benefitList = res.data.data;
                        }, function () {

                        });
                    },
                },
                mounted: function () {
                    var that = this;
                    this.elInit();
                    this.getIssueCouponList();
//                    this.getproductList('is_best');//精品
//                    this.getproductList('is_hot');//热卖
//                    this.getproductList('is_benefit');//促销
//                    this.getproductList('is_new');//首发新品
                    this.getIssueCouponList();
                    this.getCateData();
                    this.getCombinationList();//猜猜喜欢
                    setTimeout(function() {
                        that.getList();
                    },0);

                }
            })
        });
    }());</script>


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
