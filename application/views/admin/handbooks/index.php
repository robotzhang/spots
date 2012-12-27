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
            <th><a href="<?php echo site_url('admin/handbooks?unique_id='.($this->input->get('unique_id') == 'asc' ? 'desc' : 'asc')) ?>">手册ID</a></th>
            <th><a href="<?php echo site_url('admin/handbooks?is_used='.($this->input->get('is_used') == 'Y' ? 'N' : 'Y')) ?>">状态</a></th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($handbooks as $handbook): ?>
        <tr>
            <td><?php echo $handbook->id ?></td>
            <td><?php echo $handbook->unique_id ?></td>
            <td>
                <?php echo $handbook->is_used == 'Y' ? '已使用' : '未激活' ?>
            </td>
            <td><?php echo $handbook->created_at ?></td>
            <td>
                <a title="删除" onclick="if(!confirm('确定删除？'))return false;" href="<?php echo site_url('admin/handbooks/delete?id='.$handbook->id) ?>"><i class="icon-trash"></i></a>
                <?php if ($handbook->is_used != 'Y'): ?>
                |
                <a title="激活" href="<?php echo site_url('admin/handbooks/active/'.$handbook->id) ?>"><i class="icon-fire"></i></a>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered" style="height: auto;"><?php echo $pagination; ?></div>

<div class="clearfix"></div>