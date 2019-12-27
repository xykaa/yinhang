<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2019/12/26
     * Time: 16:06
     */
    namespace app\admin\controller\shangjia;
    use app\admin\controller\AuthController;
    use service\FormBuilder as Form;
    use think\Url;
    use service\JsonService as Json;
    class Activity extends AuthController{
        public $where=[];
        public function index(){
            $where=[];
            $status=input ('get.status')??null;
            $title=input ('get.title')??null;
            $where['status']=$status;
            $where['title']=$title;
            $this->where['title']=['like','%'.$title.'%'];
            if ($status) $this->where['status']=$status;
            else $this->where['status']=['in','1,2,3'];
            $list=db('shop_activity')->where ($this->where)->paginate (10)->each (function($item,$key){
                $item['add_time']=date ('Y-m-d H:i:s',$item['add_time']);
                $item['lasttime']=date('Y-m-d H:i:s',$item['lasttime']);
                $item['endtime']=date ('Y-m-d H:i:s',$item['endtime']);
                $item['name']=db('user_des')->where ('uid',$item['shop_id'])->find ()['name'];
                return $item;
            });
            $total=db('shop_activity')->count ();
            $this->assign('total',$total);
            $this->assign('page',$list->render ());
            $this->assign ('where',$where);
            $this->assign ('list',$list);
            return view();
        }
    }