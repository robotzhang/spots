<div class="mb10">
    <a class="btn" href="<?php echo site_url('admin/spots/create') ?>">
        <i class="icon-plus-sign"></i>
        添加景点
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">id</th>
            <th>景点名称</th>
            <th>所属省份</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($spots as $spot): ?>
        <tr>
            <td><?php echo $spot->id ?></td>
            <td><?php echo $spot->name ?></td>
            <td><?php echo $spot->province ?></td>
            <td><?php echo $spot->created_at ?></td>
            <td>
                <a title="编辑" href="<?php echo site_url('admin/spots/edit/'.$spot->id) ?>"><i class="icon-edit"></i></a>
                |
                <a title="删除" onclick="if(!confirm('确定删除？'))return false;" href="<?php echo site_url('admin/spots/delete/'.$spot->id) ?>"><i class="icon-trash"></i></a>
                |
                <a title="预览" target="_blank" href="<?php echo site_url('spots/show/'.$spot->id) ?>"><i class="icon-book"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>