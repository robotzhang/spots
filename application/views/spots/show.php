<div class="row">
    <div class="span9">
        <div style="box-shadow: 0 1px 2px #B0B3B6; padding: 15px; border: #DADEE1 1px solid; border-radius: 5px;">
            <p class="fs16">
                <!--div class="pull-right">
                    <form action="<?php echo site_url('tickets/sale') ?>" method="post">
                        <input type="hidden" name="spot_id" value="<?php echo $spot->id ?>"/>
                        <button class="btn btn-success" href="javascript:void(0);">优惠购买门票</button>
                    </form>
                </div-->
                <strong><?php echo $spot->name ?></strong>
            </p>
            <div>
                <img style="max-width: 700px; margin-bottom: 10px;" src="<?php echo base_url($spot->image) ?>" />
            </div>
            <div>
                <?php echo $spot->introduce ?>
            </div>
        </div>
    </div>
    <div class="span3">
        <div style="box-shadow: 0 1px 2px #B0B3B6; padding: 15px; border: #DADEE1 1px solid; border-radius: 5px;">
            <p>
                <strong>热门景点</strong>
                <a class="pull-right fs12"  href="<?php echo site_url('spots') ?>">更多</a>
            </p>
            <ol>
                <?php foreach ($spots as $key => $sp): ?>
                <li>
                    <a href="<?php echo site_url('spots/show/'.$sp->id) ?>">
                        <?php echo $sp->name ?>
                    </a>
                </li>
                <?php endforeach ?>
            </ol>
        </div>
    </div>
</div>