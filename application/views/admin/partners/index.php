<div class="mb10">
    <a class="btn" href="<?php echo site_url('admin/partners/create') ?>">
        <i class="icon-plus-sign"></i>
        添加景区账号
    </a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">id</th>
            <th>账号</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($partners as $partner): ?>
        <tr>
            <td><?php echo $partner->id ?></td>
            <td><?php echo $partner->name ?></td>
            <td><?php echo $partner->created_at ?></td>
            <td>
                <a title="编辑" href="<?php echo site_url('admin/partners/edit/'.$partner->id) ?>"><i class="icon-edit"></i></a>
                |
                <a title="删除" onclick="if(!confirm('确定删除？'))return false;" href="<?php echo site_url('admin/partners/delete/'.$partner->id) ?>"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>