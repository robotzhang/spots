<?php
    $active = $this->uri->segment(3);
?>
<style type="text/css">
    .reports li { margin: 0 20px; line-height: 32px; border-bottom: #dadada 1px dotted; }
    .reports li em { color: red; font-family: Constantia,Georgia; font-size: 20px; font-weight: 700; font-style: normal; }
    .reports li:last-child { border-bottom: none; }
</style>

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
    <li class="pull-right">
        <div class="fs12 mt10 cgray">今天是 <?php echo date('Y/m/d') ?> 星期 <?php echo date('w') ?></div>
    </li>
</ul>
<p style="margin-left: 20px;">
    <strong><?php echo date('Y/m/d', strtotime($time_start)) ?></strong>
    至
    <strong><?php echo date('Y/m/d', strtotime($time_end)) ?></strong>
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