<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">id</th>
            <th>昵称</th>
            <th>邮箱</th>
            <th>ip</th>
            <th>注册时间</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->nickname ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->ip ?></td>
            <td><?php echo $user->created_at ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>