<?php $this->layout->setLayout(array('title' => '景区合作伙伴 -- 登录')); ?>
<style type="text/css">
    .users { background-color: #FFF; margin: 50px auto; padding: 10px; width: 400px; border: 1px solid #C9C9C9; box-shadow: 0 0 3px 3px #E4E2E2; }
    .users legend { text-align: center; }
    .users .control-label { width: 80px; }
    .users .controls { margin-left: 100px; *margin-left: 0; }
</style>
<div class="users">
    <form class="form-horizontal" method="post" action="<?php echo site_url('partners/login') ?>">
        <fieldset>
            <legend>景区登录</legend>
            <input type="hidden" name="url" value="<?php echo isset($_GET['url']) ? $_GET['url'] : site_url()?>" />
            <?php if (!empty($errors)): ?>
            <div class="control-group">
                <div class="errors"><?php echo $errors['all'] ?></div>
            </div>
            <?php endif ?>
            <div class="control-group">
                <label for="partner[name]" class="control-label">账 号</label>
                <div class="controls">
                    <input type="text" name="partner[name]" value="">
                </div>
            </div>
            <div class="control-group">
                <label for="partner[password]" class="control-label">密 码</label>
                <div class="controls">
                    <input type="password" name="partner[password]" value="">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit">登录</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>