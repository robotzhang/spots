<!--ul class="nav nav-tabs">
    <li class="active"><a href="#">全部</a></li>
    <li><a href="#">已使用</a></li>
    <li><a href="#">未激活</a></li>
</ul-->
<div class="alert">
    <dl class="dl-horizontal">
        <dt>手册总数：</dt>
        <dd><span class="red_star"><?php echo $count['all'] ?></span></dd>
        <dt>已激活数量：</dt>
        <dd><span class="red_star"><?php echo $count['used_y'] ?></span></dd>
        <dt>未激活数量：</dt>
        <dd><span class="red_star"><?php echo $count['used_n'] ?></span></dd>
    </dl>
</div>

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

<div class="pagination pagination-centered" style="height: auto;"><?php echo $pagination; ?></div>