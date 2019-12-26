<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */
namespace app\admin\controller\user;

use app\admin\controller\AuthController;
use app\admin\model\system\SystemUserLevel;
use service\FormBuilder as Form;
use service\JsonService;
use think\Db;
use traits\CurdControllerTrait;
use service\UtilService as Util;
use service\JsonService as Json;
use think\Request;
use think\Url;
use app\admin\model\user\User as UserModel;
use app\admin\model\user\UserBill AS UserBillAdmin;
use basic\ModelBasic;
use service\HookService;
use app\admin\model\user\UserLevel;
use behavior\user\UserBehavior;
use app\admin\model\store\StoreVisit;
use app\admin\model\wechat\WechatMessage;
use app\admin\model\order\StoreOrder;
use app\admin\model\store\StoreCouponUser;
use app\admin\model\system\SystemLog as LogModel;

/**
 * 用户管理控制器
 * Class User
 * @package app\admin\controller\user
 */
class AdminLog extends AuthController
{
    
    public function index(){
        $where = Util::getMore([
            ['phone',''],
            ['date',''],
        ],$this->request);
        
        $list = Db::name('admin_operation_log')->paginate(20);
        $total = Db::name('admin_operation_log')->count();
        // $page = 1;
        // dump($where);die;
        $this->assign('list',$list);
        // $this->assign(LogModel::systemPage());
        $this->assign('total',$total);
        return $this->fetch();
    }

    
}
