<ul class="nav nav-tabs">
    <li class="active">
        <a href="<?php echo site_url('partners/settings') ?>">基本资料</a>
    </li>
    <li>
        <a href="<?php echo site_url('partners/settings/repassword') ?>">更改密码</a>
    </li>
</ul>

<dl class="dl-horizontal dl-just-show" style="line-height: 28px;">
    <dt>id</dt>
    <dd><?php echo current_partner()->id ?></dd>
    <dt>账号</dt>
    <dd><?php echo current_partner()->name ?></dd>
    <dt>注册时间</dt>
    <dd><?php echo date('Y-m-d', strtotime(current_partner()->created_at)) ?></dd>
</dl>
