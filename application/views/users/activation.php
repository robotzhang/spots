<?php $this->layout->setLayout(array('title' => ' -- 激活')); ?>
<style type="text/css">
    .users { margin: 0 auto; width: 400px; }
</style>
<div class="users">
    <form class="form-vertical" method="post" action="<?php echo site_url('register') ?>">
        <fieldset>
            <input type="hidden" name="url" value="<?php echo isset($_GET['url']) ? $_GET['url'] : site_url()?>" />
            <input type="hidden" name="user[ip]" value="<?php echo $this->input->ip_address() ?>" />
            <?php if (!empty($errors)): ?>
            <div class="control-group">
                <div class="errors"><?php echo join(',', $errors) ?></div>
            </div>
            <?php endif ?>
            <div class="control-group">
                <label for="user[email]" class="control-label">邮 箱</label>
                <div class="controls">
                    <input type="text" name="user[email]" value="">
                </div>
            </div>
            <div class="control-group">
                <label for="user[password]" class="control-label">密 码</label>
                <div class="controls">
                    <input type="password" name="user[password]" value="">
                </div>
            </div>
            <div class="control-group">
                <label for="user[repassword]" class="control-label">确认密码</label>
                <div class="controls">
                    <input type="password" name="user[repassword]" value="">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primery" type="submit">注册</button>
                    <span style="font-size: 12px; color: #777; margin-left: 10px;">已有账号？<a href="<?php echo site_url('login') ?>">登陆</a></span>
                </div>
            </div>
        </fieldset>
    </form>
</div>