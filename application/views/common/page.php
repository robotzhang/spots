<ul>
	<?php if ($now_page - 1 >= 1): ?>
	<li><a href="<?php echo $base_url.'&page='.($now_page-1); ?>">上一页</a></li>	
	<?php endif;?>
	
	<?php for ($page = 1; $page <= $pages; $page++): ?>
	<li <?php if ($page == $now_page) echo 'class="active"' ?>>
        <a href="<?php echo $base_url.'&page='.$page; ?>"><?php echo $page;?></a>
    </li>
	<?php endfor; ?>
	
	<?php if ($now_page + 1 <= $pages): ?>
	<li><a href="<?php echo $base_url.'&page='.($now_page + 1); ?>">下一页</a></li>
	<?php endif; ?>	
</ul>