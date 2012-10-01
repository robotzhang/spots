<p class="fs18"><strong>uto168景点大全</strong></p>
<ul class="unstyled">
    <?php foreach ($spots as $spot): ?>
    <li style="box-shadow: 0 1px 2px #B0B3B6; padding: 15px; border: #DADEE1 1px solid; padding: 15px; border-radius: 5px; margin: 15px 0;">
        <p><a class="fs16" href="<?php echo site_url('spots/show/'.$spot->id) ?>"><?php echo $spot->name ?></a></p>
        <div><?php echo strip_tags(mb_substr($spot->introduce, 0 ,300)) ?></div>
    </li>
    <?php endforeach ?>
</ul>