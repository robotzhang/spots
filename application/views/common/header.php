<?php $action = $this->uri->segment(1); ?>
<div class="header_new">
    <div class="container">
        <div class="pull-left"><a class="logo" href="<?php echo site_url('') ?>">ChinaZjy.Org</a></div>
        <div class="member clearfix pull-right">
            <?php if (is_login()): ?>
            <a href="<?php echo site_url('my') ?>">欢迎 <i class="icon-edit"></i><?php echo current_user()->nickname; ?></a>
            -
            <a href="<?php echo site_url('logout?url='.current_url()) ?>">退出 <i class="icon-off"></i></a>
            <?php else: ?>
            <a href="<?php echo site_url('') ?>">激活</a> -
            <a href="<?php echo site_url('login?url='.current_url()) ?>">登录</a>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="header_nav">
    <ul class="container">
        <li><a<?php if(empty($action)) echo ' class="current"'?> href="<?php echo site_url('') ?>">首页</a></li>
        <li><a<?php if($action == 'users') echo ' class="current"'?> href="<?php echo site_url('users/activation') ?>">激活手册</a></li>
        <li><a<?php if($action == 'spots') echo ' class="current"'?> href="<?php echo site_url('spots') ?>">景点大全</a></li>
        <li><a<?php if($action == 'about') echo ' class="current"'?> href="<?php echo site_url('about') ?>">关于我们</a></li>
    </ul>
</div>