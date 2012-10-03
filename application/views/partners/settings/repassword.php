<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo site_url('partners/settings') ?>">基本资料</a>
    </li>
    <li class="active">
        <a href="<?php echo site_url('partners/settings/repassword') ?>">更改密码</a>
    </li>
</ul>

<div class="clearfix mb20"></div>

<form class="form-horizontal" method="post" action="<?php echo site_url('partners/settings/repassword') ?>">
    <fieldset>
        <?php if (!empty($errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $errors) ?>
        </div>
        <?php endif ?>
        <?php $message = $this->session->flashdata('message'); ?>
        <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif ?>
        <div class="control-group">
            <label for="password_old" class="control-label">原密码</label>
            <div class="controls">
                <input type="password" name="password_old" class="input" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="password_new" class="control-label">新密码</label>
            <div class="controls">
                <input type="password" name="password_new" class="input" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="password_confirm" class="control-label">确认新密码</label>
            <div class="controls">
                <input type="password" name="password_confirm" class="input" value="">
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit">确定</button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>
