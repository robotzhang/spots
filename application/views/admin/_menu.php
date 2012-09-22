<?php
    $action = $this->uri->segment(1);
    $action_next = $this->uri->segment(2);
?>

<div class="menu">
    <ul class="unstyled">
        <li><a href="<?php echo site_url('my') ?>">我的主页</a></li>
        <li><a href="<?php echo site_url('my/rooms') ?>">课堂管理</a></li>
        <li><a href="<?php echo site_url('my/lessons') ?>">课程管理</a></li>
        <li><a href="<?php echo site_url('my/homework') ?>">作业管理</a></li>
        <li><a href="<?php echo site_url('my/accounts') ?>">账户管理</a></li>
    </ul>
</div>