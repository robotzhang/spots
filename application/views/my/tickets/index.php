<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:void(0);">购买记录</a></li>
    <li><a href="<?php echo site_url('my/my/time_line') ?>">时光轴</a></li>
</ul>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>景点名称</th>
            <th>已购票数</th>
            <th>剩余票数</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($spots as $spot): ?>
        <?php $ticket_count = count($spot->tickets); ?>
        <tr>
            <td><?php echo $spot->id ?></td>
            <td><?php echo $spot->name ?></td>
            <td>
                <?php echo $ticket_count ?>
                <?php if ($ticket_count > 0): ?>
                <ul class="unstyled">
                    <?php foreach($spot->tickets as $ticket): ?>
                    <li>
                        <?php echo $ticket->created_at ?>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>
            </td>
            <td><?php echo (3-$ticket_count) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo $pagination; ?></div>