{extend name="public/container"}
{block name="content"}
<div class="row">
    
    <div class="col-sm-12">
        
        <div class="ibox float-e-margins">
            
            <div class="ibox-title">
                
                <button type="button" class="btn btn-w-m btn-primary add-filed">添加门店类别</button>
            
            </div>
            <div class="ibox-content">
                
                <div class="row">
                    
                    <div class="m-b m-l">
                        
                        <form action="" class="form-inline">
                            
                            <select name="status" aria-controls="editable" class="form-control input-sm">
                                <option value="">活动状态</option>
                                <option value="1" {eq name="$where.status" value="1"}selected="selected"{/eq}>开始</option>
                                <option value="2" {eq name="$where.status" value="2"}selected="selected"{/eq}>已结束</option>
                                <option value="3" {eq name="$where.status" value="3"}selected="selected"{/eq}>未开始</option>
                            </select>
                            <div class="input-group" style="margin-top: 5px">
                                <input type="text" placeholder="请输入商家名或者活动名" class="input-sm form-control" name="title" value="{$where.title}">
                                <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search" ></i>搜索</button> </span>
                            </div>
                        
                        </form>
                    
                    </div>
                
                
                
                </div>
                
                <div class="table-responsive">
                    
                    <table class="table table-striped  table-bordered">
                        
                        <thead>
                        
                        <tr>
                            
                            
                            
                            <th>编号</th>
                            
                            <th>所属店家</th>
                            
                            <th>活动名称</th>
                            
                            <th>活动logo</th>
                            
                            <th>活动详情</th>
                            <th>活动备注</th>
                            <th>添加时间</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
    
                            <th>需要积分</th>
                            <th>抵扣金额</th>
                            <th>活动状态</th>
                            <th>参与人数</th>
                            
                            <th>操作</th>
                        
                        </tr>
                        
                        </thead>
                        
                        <tbody class="">
                        
                        {volist name="list" id="vo"}
                        
                        <tr>
                            
                            <td class="text-center">
                                
                                {$vo.id}
                            
                            </td>
                            
                            <td class="text-center">
                                
                                {$vo.name}
                            
                            </td>
                            
                            <td class="text-center">
                                {$vo.title}
                            
                            
                            </td>
                            <td  data-field="image" data-key="1-0-1" data-content="http://datong.crmeb.net/public/uploads/attach/2019/01/15/5c3dba1366885.jpg">
                                <div class="layui-table-cell laytable-cell-1-0-1">
                                    <img style="cursor: pointer" lay-event="open_image" src="http://datong.crmeb.net/public/uploads/attach/2019/01/15/5c3dba1366885.jpg">
                                </div>
                              
                                
                             


                            </td>
                            <td class="text-center">
                                {if condition="$vo['status'] eq 1"}
                                <i class="fa fa-check text-navy"></i>
                                {else/}
                                <i class="fa fa-close text-danger"></i>
                                {/if}
                            
                            </td>
                            
                            <td class="text-center">
                                
                                {$vo.add_time}
                            
                            </td>
                            
                            
                            <td class="text-center">
                                
                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('编辑','{:Url('edit',array('id'=>$vo['id']))}')"><i class="fa fa-paste"></i> 编辑</button>
                                
                                <button class="btn btn-warning btn-xs del_config_tab" data-id="{$vo.id}" type="button" data-url="{:Url('delete',array('id'=>$vo['id']))}" ><i class="fa fa-warning"></i> 删除
                                
                                </button>
                            
                            </td>
                        
                        </tr>
                        
                        {/volist}
                        
                        </tbody>
                    
                    </table>
                
                </div>
                
                {include file="public/inner_page"}
            
            </div>
        
        </div>
    
    </div>

</div>
{/block}

{block name="script"}
<script src="{__ADMIN_PATH}js/layuiList.js"></script>
<script>

    $('.image_info').on('click',function (e) {
        var image_url = $(this).data('image');
        $eb.openImage(image_url);
    })
    $('.add-filed').on('click',function (e) {
        $eb.createModalFrame(this.innerText,"{:Url('create')}");
    })
    $('.del_config_tab').on('click',function(){

        var _this = $(this),url =_this.data('url');

        $eb.$swal('delete',function(){

            $eb.axios.get(url).then(function(res){

                if(res.status == 200 && res.data.code == 200) {

                    $eb.$swal('success',res.data.msg);

                    _this.parents('tr').remove();

                }else

                    return Promise.reject(res.data.msg || '删除失败')

            }).catch(function(err){

                $eb.$swal('error',err);

            });

        })

    });
    $('.add_filed_base').on('click',function (e) {
        $eb.swal({
            title: '请选择数据类型',
            input: 'radio',
            inputOptions: ['文本框','多行文本框','单选框','文件上传','多选框'],
            inputValidator: function(result) {
                return new Promise(function(resolve, reject) {
                    if (result) {
                        resolve();
                    } else {
                        reject('请选择数据类型');
                    }
                });
            }
        }).then(function(result) {
            if (result) {
                $eb.createModalFrame(this.innerText,"{:Url('SystemConfig/create')}?type="+result);
            }
        })
    })

    //实例化form
$eb.openImage('http://datong.crmeb.net/public/uploads/attach/2019/01/15/5c3dba1366885.jpg');
    layList.tool(function (event,data,obj) {
        
        switch (event) {
           
            case 'open_image':
                $eb.openImage(data.image);
                break;
            case 'edit':
                $eb.createModalFrame(data.store_name+'-编辑',layList.U({a:'edit',q:{id:data.id}}),{h:720,w:1100});
                break;
            case 'attr':
                $eb.createModalFrame(data.store_name+'-属性',layList.U({a:'attr',q:{id:data.id}}),{h:600,w:800})
                break;
        }
    })
</script>
{/block}