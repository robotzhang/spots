<?php
    $action = $this->uri->segment(1);
    $action_next = $this->uri->segment(2);
?>

<div>
    <ul class="nav nav-tabs">
        <li<?php if ($action_next=='reports') echo ' class="active"' ?> ><a href="<?php echo site_url('admin/reports') ?>">系统报表</a></li>
        <li<?php if ($action_next=='handbooks') echo ' class="active"' ?> ><a href="<?php echo site_url('admin/handbooks') ?>">手册维护</a></li>
        <li<?php if ($action_next=='spots') echo ' class="active"' ?> ><a href="<?php echo site_url('admin/spots') ?>">景点维护</a></li>
        <li<?php if ($action_next=='users') echo ' class="active"' ?> ><a href="<?php echo site_url('admin/users') ?>">用户维护</a></li>
        <li<?php if ($action_next=='partners') echo ' class="active"' ?> ><a href="<?php echo site_url('admin/partners') ?>">景区账号</a></li>
    </ul>
</div>