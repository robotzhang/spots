<div class="header">
    <div class="container">
        <div class="pull-left"><a href="<?php echo site_url('') ?>"><img src="<?php echo base_url('static/images/logo.png') ?>"/> 聪明你的旅程</a></div>
        <div class="member clearfix pull-right">
            <?php if (is_login()): ?>
                <a href="javascript:void(0);">欢迎 <i class="icon-edit"></i><?php echo current_user()->nickname; ?></a>
                -
                <a href="<?php echo site_url('logout?url='.current_url()) ?>">退出 <i class="icon-off"></i></a>
            <?php else: ?>
                <a href="<?php echo site_url('') ?>">激活</a> -
                <a href="<?php echo site_url('login?url='.current_url()) ?>">登录</a>
            <?php endif ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.show_drop_menu').click(function() {
            $('.dropdown-menu').css({
                top:$(this).offset().top + $(this).outerHeight(),
                left:$(this).offset().left - ($('.dropdown-menu').outerWidth() - $(this).outerWidth()),
                right: 'auto'
            }).toggle();
            return false;
        });
        $(document).click(function(){
            $('.dropdown-menu').hide();
        });
    });
</script>