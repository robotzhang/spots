<?php $action_next = $this->uri->segment(2); ?>
<ul class="nav nav-tabs nav-stacked" style="margin-right:  20px;">
    <li<?php if($action_next=='active') echo ' class="active"' ?>>
        <a href="<?php echo site_url('about/active') ?>"><i class="icon-flag"></i> 活动介绍</a>
    </li>
    <li<?php if($action_next=='lines') echo ' class="active"' ?>>
        <a href="<?php echo site_url('about/lines') ?>"><i class="icon-road"></i> 线路推介</a>
    </li>
    <li<?php if($action_next=='tools') echo ' class="active"' ?>>
        <a href="<?php echo site_url('about/tools') ?>"><i class="icon-tag"></i> 旅行工具箱</a>
    </li>
    <li<?php if($action_next=='books') echo ' class="active"' ?>>
        <a href="<?php echo site_url('about/books') ?>"><i class="icon-book"></i> 自驾游路书</a>
    </li>
    <li<?php if($action_next=='company') echo ' class="active"' ?>>
        <a href="<?php echo site_url('about/company') ?>"><i class="icon-info-sign"></i> 公司简介</a>
    </li>
</ul>