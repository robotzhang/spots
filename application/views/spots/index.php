<div class="row">
    <span class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <?php foreach ($provinces as $province): ?>
            <li<?php if($province->name == $this->input->get('province')) echo ' class="active"' ?>>
                <a href="<?php echo site_url('spots?province='.urlencode($province->name)) ?>"><?php echo $province->name ?></a>
            </li>
            <?php endforeach ?>
        </ul>
    </span>
    <span class="span9">
        <p class="fs16"><strong>景点大全</strong></p>
        <ul class="unstyled">
            <?php foreach ($spots as $spot): ?>
            <li style="line-height: 32px; border-bottom: #dadada 1px dotted;">
                <a class="fs14" href="<?php echo site_url('spots/show/'.$spot->id) ?>"><?php echo $spot->name ?></a>
            </li>
            <?php endforeach ?>
        </ul>
        <div class="pagination pagination-centered"><?php echo $pagination; ?></div>
    </span>
</div>
