<?php
    $action = $this->uri->segment(1);
    $action_next = $this->uri->segment(2);
    $action_final = $this->uri->segment(3);
?>
<div class="mb10">
    <div><a style="color: #1992C9;" href="javascript:void(0);"><strong><?php echo current_partner()->name ?></strong></a></div>
    <div class="fs12">于<?php echo date('Y-m-d', strtotime(current_partner()->created_at)) ?>创建</div>
</div>
<div class="border"></div>
<ul class="unstyled module_nav">
    <li <?php if ($action_next=='reports') echo 'class="selected"' ?>>
        <i class="report" ></i>
        <a href="<?php echo site_url('partners/reports') ?>">报表</a>
    </li>
    <li <?php if ($action_next=='tickets') echo 'class="selected"' ?>>
        <i class="ticket" ></i>
        <a href="<?php echo site_url('partners/tickets/sale') ?>">售票</a>
    </li>
    <li <?php if ($action_next=='setting') echo 'class="selected"' ?>>
        <i class="setting" ></i>
        <a href="#">设置</a>
    </li>
</ul>