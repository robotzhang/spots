<div class="header">
    <div class="container">
        <div class="pull-left">
            <a class="fs18" href="<?php echo site_url('admin') ?>">
                chinazjy.org后台管理系统
            </a>
        </div>
        <div class="member clearfix pull-right">
            <a href="<?php echo site_url('my') ?>">欢迎: <?php echo $this->session->userdata('admin')->name; ?> <i class="icon-edit"></i></a>
            -
            <a href="<?php echo site_url('admin/logout?url='.current_url()) ?>">退出 <i class="icon-off"></i></a>
        </div>
    </div>
</div>