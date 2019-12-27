{extend name="public/container"}
{block name="head_top"}
<script src="{__PLUG_PATH}moment.js"></script>
<link rel="stylesheet" href="{__PLUG_PATH}daterangepicker/daterangepicker.css">
<script src="{__PLUG_PATH}daterangepicker/daterangepicker.js"></script>
{/block}
{block name="content"}
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="m-b m-l">
                    <form action="" class="form-inline" id="form" method="get">


<div class="input-group datepicker">
    <input style="width: 188px;" type="text" id="data" class="input-sm form-control" name="data" value="" placeholder="请选择日期" >
</div>

<div class="input-group">
    <input type="text" name="phone" value="" placeholder="请输入手机号" class="input-sm form-control"> <span class="input-group-btn">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search" ></i> 搜索</button> </span>
</div>
</form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">日志编号</th>
                            <th class="text-center">用户ID</th>
                            <th class="text-center">用户名</th>
                            <th class="text-center">类型</th>

                            <th class="text-center">操作描述</th>
                            <th class="text-center">操作时间</th>
                        </tr>
                        </thead>

                        <tbody class="">
                        {volist name="list" id="vo"}
                        <tr>
                            <td class="text-center">
                                {$vo.log_id}
                            </td>
                            <td class="text-center">
                                {$vo.uid}
                            </td>
                            <td class="text-center">
                                {$vo.phone}
                            </td>
                            <td class="text-center">
                                {$vo.action_type}
                            </td>

                            <td class="text-center">
                                {$vo.desc}
                            </td>
                            <td class="text-center">
                                {$vo.change_time|date="Y-m-d H:i:s",###}
                            </td>
                        </tr>
                        {/volist}
                        </tbody>
                    </table>
                </div>
                {include file="public/inner_page1"}
            </div>
        </div>
    </div>
</div>
{/block}
{block name="script"}
<script>
    var dateInput =$('.datepicker');
    dateInput.daterangepicker({
        autoUpdateInput: false,
        "opens": "center",
        "drops": "down",
        "ranges": {
            '今天': [moment(), moment().add(1, 'days')],
            '昨天': [moment().subtract(1, 'days'), moment()],
            '上周': [moment().subtract(6, 'days'), moment()],
            '前30天': [moment().subtract(29, 'days'), moment()],
            '本月': [moment().startOf('month'), moment().endOf('month')],
            '上月': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        "locale" : {
            applyLabel : '确定',
            cancelLabel : '清空',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            format : 'YYYY/MM/DD',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月',
                '七月', '八月', '九月', '十月', '十一月', '十二月' ],
            firstDay : 1
        }
    });
    dateInput.on('cancel.daterangepicker', function(ev, picker) {
        $("#data").val('');
    });
    dateInput.on('apply.daterangepicker', function(ev, picker) {
        $("#data").val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
    });
</script>
{/block}
