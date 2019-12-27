<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"C:\Users\Carry\Desktop\yinhang/application/admin\view\ump\store_coupon\grant.php";i:1577343682;s:74:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\container.php";i:1577156537;s:75:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\frame_head.php";i:1577156537;s:70:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\style.php";i:1577156537;s:77:"C:\Users\Carry\Desktop\yinhang\application\admin\view\public\frame_footer.php";i:1577156537;}*/ ?>
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
    
<script src="/public/system/frame/js/content.min.js"></script>
<script src="/public/static/plug/sweetalert2/sweetalert2.all.min.js"></script>

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

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-8 m-b-xs">
                        <form action="" class="form-inline">
                            <i class="fa fa-search" style="margin-right: 10px;"></i>
                            <div class="input-group" style="width: 80%">
                            
                            
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        
                        </thead>
                        <tbody class="">
                        <tr>
                            <td class="text-center">
                                <input type="text" name="title"  placeholder="请输入积分数量" class="input-sm form-control jk"> <span class="input-group-btn">
                                <button class="btn btn-primary btn-xs grant" data-url="<?php echo Url('ump.storeCouponUser/grant',array('uid'=>$uid)); ?>" type="button"><i class="fa  fa-arrow-circle-o-right"></i> 发放
                                </button>
                            </td>
                        </tr>
                    
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>



<script>
    $('.grant').on('click',function(){
        window.t = $(this);
        var a=$('.jk').val();
        var _this = $(this),url =_this.data('url');
        swal({
            title: "您确定要发放积分吗？",
            text:"发放后将无法撤回，请谨慎操作！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText:"是的，我要发放！",
            cancelButtonText:"让我再考虑一下…",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(){
            $eb.axios.get(url,{params:{'key':a}}).then(function(res){
                if(res.status == 200 && res.data.code == 200) {
                    swal(res.data.msg);
                }else
                    return Promise.reject(res.data.msg || '发放失败')
            }).catch(function(err){
                swal(err);
            });
        }).catch(console.log);
    });
</script>


</div>
</body>
</html>
