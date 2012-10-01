<?php $this->layout->setLayout(array('title' => '景区合作伙伴 -- 登录')); ?>
<div class="users">
    <form method="post" action="<?php echo site_url('partners/login') ?>">
        <div class="item">
            <label>账号</label>
            <input type="text" name="partner[name]" value="">
        </div>
        <div class="item">
            <label>密码</label>
            <input type="password" name="partner[password]" value="">
        </div>
        <div class="item">
            <button class="btn" style="margin-left: 38px;" type="submit">登录</button>
        </div>
    </form>
</div>