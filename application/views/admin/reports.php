<!--ul class="nav nav-tabs">
    <li class="active"><a href="#">全部</a></li>
    <li><a href="#">已使用</a></li>
    <li><a href="#">未激活</a></li>
</ul-->
<table class="table">
    <thead>
    <tr>
        <th width="40">id</th>
        <th>手册ID</th>
        <th>状态</th>
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
    </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>