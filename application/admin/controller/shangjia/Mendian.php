<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2019/12/25
     * Time: 11:00
     */
    namespace app\admin\controller\shangjia;
    use app\admin\controller\AuthController;
    use service\FormBuilder as Form;
    use think\Url;
    use service\JsonService as Json;
    class Mendian extends AuthController{
        public $where=[];//查询条件
        public $count=10;//没页数量
        public function index(){
            $status=input('get.status');
            $title=input('get.title')??'';
           
            $this->where['title']=$title;
            $where=[];
           
            if ($status==='0'||$status==='1'){
               
               $this->where['status']=$status;
               $where['status']=['eq',$status];
            }else{
                $this->where['status']=null;
            }
            $where['name']=['like','%'.$title.'%'];
          
            $count=db('cats')->count ();
            $this->assign('total',$count);
           
         // var_dump ($where);exit;
            $list=db('cats')->where ($where)->order('time desc')->paginate ($this->count)->each (function($item,$key){
               
                $item['time']=date ('Y-m-d H:i:s',$item['time']);
                return $item;
            });
           // echo db('cats')->getLastSql();
           
            $this->assign('list',$list);
            $this->assign('page',$list->render ());
           $this->assign('where',$this->where);
           return view();
        }
        public function create(){
            $f[] = Form::input('name','类目名称');
            $f[] = Form::input('order','类目排序');
//        $f[] = Form::select('new_id','图文列表')->setOptions(function(){
//            $list = ArticleModel::getNews();
//            $options = [];
//            foreach ($list as $id=>$roleName){
//                $options[] = ['label'=>$roleName,'value'=>$id];
//            }
//            return $options;
//        })->multiple(1)->filterable(1);
    
           // $f[] = Form::formFrameImageOne('image','分类图片');
            //$f[] = Form::number('sort','排序',0);
            $f[] = Form::radio('status','状态',1)->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
            $form = Form::make_post_form('添加类目',$f,Url::build('save'));
            $this->assign(compact('form'));
            return $this->fetch('public/form-builder');
          
        }
        public function save(){
           $data=input('post.');
           if (!$data) return json (['code'=>0,'msg'=>'表单必须有值']);
           if(!$data['name']) return json (['code'=>0,'类目名称不能为空']);
           //if(!$data['name']) return json (['code'=>0,'类目名称不能为空']);
            $data['time']=time ();
            if(db('cats')->insert ($data)) return json (['code'=>200,'msg'=>'添加类目成功']);
        }
        public function edit($id){
            if(!$id) return $this->failed ('参数错误');
            $cats=db('cats')->where ('id',$id)->find ();
            $f[] = Form::input('name','类目名称',$cats['name']);
            $f[] = Form::input('order','类目排序',$cats['order']);
//        $f[] = Form::select('new_id','图文列表')->setOptions(function(){
//            $list = ArticleModel::getNews();
//            $options = [];
//            foreach ($list as $id=>$roleName){
//                $options[] = ['label'=>$roleName,'value'=>$id];
//            }
//            return $options;
//        })->multiple(1)->filterable(1);
    
            // $f[] = Form::formFrameImageOne('image','分类图片');
            //$f[] = Form::number('sort','排序',0);
            $f[] = Form::radio('status','状态',$cats['status'])->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
            $form = Form::make_post_form('添加类目',$f,Url::build('update',['id'=>$id]));
            $this->assign (compact ('form'));
            return $this->fetch('public/form-builder');
            
            
        }
        public function update($id){
            if(!$id) return $this->failed ('参数错误');
            $data=request ()->post();
            if (!$data) return $this->failed ('表单必须有参数');
            if(!$data['name']) return $this->failed ('类目名不能为空');
            if(!db('cats')->where ('id',$id)->update ($data)) return Json::fail('更新失败');
            return json::success ('更新成功');
            
        }
        public function delete($id){
            if (!$id) return json::fail ('参数错误');
            if(!db('cats')->where ('id',$id)->delete ()) return json::fail ('删除失败');
            return  json::success ('删除成功');
        }
    }