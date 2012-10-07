<div class="mb10">
    <a class="btn" target="_blank" href="<?php echo site_url('') ?>">
        <i class="icon-plus-sign"></i>
        添加用户
    </a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">id</th>
            <th>手机号码</th>
            <th>ip</th>
            <th>激活时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->mobile ?></td>
            <td><?php echo $user->ip ?></td>
            <td><?php echo $user->created_at ?></td>
            <td>
                <a title="编辑" href="<?php echo site_url('admin/users/edit/'.$user->id) ?>"><i class="icon-edit"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>