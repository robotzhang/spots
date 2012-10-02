<style type="text/css">
    .reports li { margin: 0 20px; line-height: 32px; border-bottom: #dadada 1px dotted; }
    .reports li em { color: red; font-family: Constantia,Georgia; font-size: 20px; font-weight: 700; font-style: normal; }
</style>
<p class="fs14"><strong>一周内门票售出情况</strong></p>
<ul class="unstyled reports">
    <?php foreach ($spots as $spot): ?>
    <li>
        <span><?php echo $spot->name ?></span> 售出
        <em><?php echo $spot->ticket_counts ?></em> 张
    </li>
    <?php endforeach ?>
</ul>