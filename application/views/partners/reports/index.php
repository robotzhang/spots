<?php
    $active = $this->uri->segment(3);
?>
<style type="text/css">
    .reports li { margin: 0 20px; line-height: 32px; border-bottom: #dadada 1px dotted; }
    .reports li em { color: red; font-family: Constantia,Georgia; font-size: 20px; font-weight: 700; font-style: normal; }
    .reports li:last-child { border-bottom: none; }
</style>
<div class="pull-right">
    <div class="fs12 mt10 cgray">今天是 <?php echo date('Y/m/d') ?> 星期 <?php echo date('w') ?></div>
</div>
<ul class="nav nav-tabs">
    <li<?php if ($active == 'day') echo ' class="active"' ?>>
        <a href="<?php echo site_url('partners/reports/day') ?>">今日统计</a>
    </li>
    <li<?php if ($active == 'week') echo ' class="active"' ?>>
        <a href="<?php echo site_url('partners/reports/week') ?>">一周统计</a>
    </li>
    <li<?php if ($active == 'month') echo ' class="active"' ?>>
        <a href="<?php echo site_url('partners/reports/month') ?>">当月统计</a>
    </li>
    <li<?php if ($active == 'all') echo ' class="active"' ?>>
        <a href="<?php echo site_url('partners/reports/all') ?>">所有统计</a>
    </li>
</ul>

<p style="margin-left: 20px;">
    <?php if (!empty($time_start)): ?>
    <strong><?php echo date('Y/m/d', strtotime($time_start)) ?></strong>
    <?php endif ?>
    <?php if (!empty($time_end)): ?>
    至
    <strong><?php echo date('Y/m/d', strtotime($time_end)) ?></strong>
    <?php endif ?>
    门票售出情况如下：

</p>
<ul class="unstyled reports">
    <?php foreach ($spots as $spot): ?>
        <?php if (!empty($spot->ticket_counts)): ?>
        <li>
            <span><?php echo $spot->name ?></span> 售出
            <em><?php echo $spot->ticket_counts ?></em> 张
        </li>
        <?php endif ?>
    <?php endforeach ?>
</ul>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>手册id</th>
        <th>购买人</th>
        <th>购买时间</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tickets as $ticket): ?>
    <tr>
        <td><?php echo $ticket->handbook_unique_id ?></td>
        <td><?php echo $ticket->user->mobile ?></td>
        <td><?php echo $ticket->created_at ?></td>
    </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="pagination pagination-centered"><?php echo $pagination; ?></div>