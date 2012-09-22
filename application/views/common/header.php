<div class="header">
    <div class="container">
        <a href="/"><img src="<?php echo base_url('static/images/logo.png') ?>"/> 易教易学，人人为师</a>
        <div class="member clearfix pull-right">
            <?php if (is_login()): ?>
                <a href="javascript:void(0);" class="show_drop_menu">
                    欢迎：<?php echo substr(current_user()->email, 0, strpos(current_user()->email, '@')); ?>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0);"><i class="icon-inbox"></i> 我的订单</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('logout?url='.current_url()) ?>"><i class="icon-off"></i> 退出</a></li>
                </ul>
            <?php else: ?>
                <a href="<?php echo site_url('register?url='.current_url()) ?>">注册</a> -
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