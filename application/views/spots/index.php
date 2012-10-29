<style type="text/css">
    .spots li { float: left; width: 200px; margin: 8px; box-shadow: 0 1px 2px #B0B3B6; padding: 8px; border: #DADEE1 1px solid; border-radius: 3px; }
    .spots li .img img { width: 200px; height: 300px; }
    .spots li .name, .spots li .name a { color: #666; font-size: 12px; }
</style>
<div class="row">
    <span class="span3">
        <ul class="nav nav-tabs nav-stacked" style="margin-right: 20px;">
            <?php foreach ($provinces as $province): ?>
            <li<?php if($province->name == $this->input->get('province')) echo ' class="active"' ?>>
                <a href="<?php echo site_url('spots?province='.urlencode($province->name)) ?>">
                    <?php echo $province->name ?>
                    <span>(<?php echo $province->count ?>)</span>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </span>
    <span class="span9">
        <p class="fs16"><strong>景点大全</strong></p>
        <ul class="unstyled spots clearfix">
            <?php foreach ($spots as $key=>$spot): ?>
            <?php
                $style = '';
                if ($key % 3 == 0) {
                    $style = ' style="margin-left: 0;" ';
                } else if ($key % 3 == 2) {
                    $style = ' style="margin-right: 0;" ';
                }
            ?>
            <li<?php echo $style ?>>
                <div class="img">
                    <img src="<?php echo base_url($spot->image) ?>" />
                </div>
                <div class="name mt10">
                    <a href="<?php echo site_url('spots/show/'.$spot->id) ?>"><?php echo $spot->name ?></a>
                    <span class="pull-right"><?php echo $spot->province ?></span>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
        <div class="pagination pagination-centered"><?php echo $pagination; ?></div>
    </span>
</div>
