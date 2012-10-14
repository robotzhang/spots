<ul class="nav nav-tabs">
    <li><a href="<?php echo site_url('my/tickets') ?>">购买记录</a></li>
    <li class="active"><a href="javascript:void(0);">时光轴</a></li>
</ul>
<div class="timeline">
    <div class="dotted"></div>
    <div class="warp">
        <div class="item_box">
            <div class="pop-triangle"></div>
            <div>
                <span class="date"><?php echo date('Y-m-d', strtotime(current_user()->created_at)) ?></span>
                成功注册
            </div>
        </div>
    </div>
    <div class="dotted"></div>
    <div class="warp">
        <div class="item_box">
            <div class="pop-triangle"></div>
            <div>
                <span class="date"><?php echo date('Y-m-d', strtotime($handbook->updated_at)) ?></span>
                成功激活景点手册<span class="red"><?php echo $handbook->unique_id ?></span>
            </div>
        </div>
    </div>
    <?php foreach ($tickets as $ticket): ?>
    <div class="dotted"></div>
    <div class="warp">
        <div class="item_box">
            <div class="pop-triangle"></div>
            <div>
                <span class="date"><?php echo date('Y-m-d', strtotime($ticket->created_at)) ?></span>
                成功购买<a target="_blank" href="<?php echo site_url('spots/show/'.$ticket->spot->id) ?>" class="red"><?php echo $ticket->spot->name ?></a>景区门票
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
