<?php $this->layout->setLayout(array('title' => '帮我客 -- 登录')); ?>
<style type="text/css">
    .users { background-color: #FFF; margin: 50px auto; padding: 10px; width: 400px; border: 1px solid #C9C9C9; box-shadow: 0 0 3px 3px #E4E2E2; }
    .users legend { text-align: center; }
    .users .control-label { width: 80px; }
    .users .controls { margin-left: 100px; *margin-left: 0; }
</style>
<div class="users">
    <form class="form-horizontal" method="post" action="<?php echo site_url('login') ?>">
        <fieldset>
            <legend>登录</legend>
            <input type="hidden" name="url" value="<?php echo isset($_GET['url']) ? $_GET['url'] : site_url()?>" />
            <?php if (!empty($errors)): ?>
            <div class="control-group">
                <div class="errors"><?php echo join('<br>', $errors) ?></div>
            </div>
            <?php endif ?>
            <div class="control-group">
                <label for="user[mobile]" class="control-label">手 机</label>
                <div class="controls">
                    <input type="text" name="user[mobile]" value="">
                </div>
            </div>
            <div class="control-group">
                <label for="user[password]" class="control-label">密 码</label>
                <div class="controls">
                    <input type="password" name="user[password]" value="">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit">登录</button>
                    <span style="font-size: 12px; color: #777; margin-left: 10px;">还没账号？<a href="<?php echo site_url('register') ?>">激活</a></span>
                </div>
            </div>
        </fieldset>
    </form>
</div>