<div class="timeline">
    <p class="fs16 mb20"><strong>我的时光轴</strong></p>
    <div class="dotted"></div>
    <div class="warp">
        <div class="item_box">
            <div class="pop-triangle"></div>
            <div>
                <div class="date"><?php echo date('Y-m-d', strtotime(current_user()->created_at)) ?></div>
                成功注册
            </div>
        </div>
    </div>
    <div class="dotted"></div>
    <div class="warp">
        <div class="item_box">
            <div class="pop-triangle"></div>
            <div>
                <div class="date"><?php echo date('Y-m-d', strtotime($handbook->updated_at)) ?></div>
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
                <div class="date"><?php echo date('Y-m-d', strtotime($ticket->created_at)) ?></div>
                成功购买<span class="red"><?php echo $ticket->spot->name ?></span>景区门票
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
