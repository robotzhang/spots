<div><a style="color: #1992C9;" href="javascript:void(0);"><?php echo current_partner()->name ?></a></div>
<div class="fs12">于<?php echo date('Y-m-d', strtotime(current_partner()->created_at)) ?>创建</div>
<ul class="unstyled">
    <li><a href="<?php echo site_url('partners/tickets/sale') ?>">售票</a></li>
    <li><a href="#">报表</a></li>
    <li><a href="#">设置</a></li>
</ul>