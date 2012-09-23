<div class="mb10">
    <a class="btn" href="<?php echo site_url('admin/handbooks/create') ?>">
        <i class="icon-plus-sign"></i>
        新建景点手册
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">id</th>
            <th>手册ID</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($handbooks as $handbook): ?>
        <tr>
            <td><?php echo $handbook->id ?></td>
            <td><?php echo $handbook->unique_id ?></td>
            <td><?php echo $handbook->created_at ?></td>
            <td>
                <a title="删除" onclick="if(!confirm('确定删除？'))return false;" href="<?php echo site_url('admin/handbooks/delete?id='.$handbook->id) ?>"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>