<p>课程管理</p>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>课堂名称</th>
        <th>参与人数</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><a href="javascript:void(0);">来，我们来学php</a></td>
        <td>20</td>
        <td><?php echo date("Y-m-d H:i:s") ?></td>
        <td>
            <a title="编辑" href="javascript:void(0);"><i class="icon-edit"></i></a>
            |
            <a title="删除" onclick="if(!confirm('确定删除？'))return false;" href="javascript:void(0);"><i class="icon-trash"></i></a>
        </td>
    </tr>
    </tbody>
</table>

<div class="pagination pagination-centered"></div>