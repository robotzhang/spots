<form class="form-horizontal" method="post" action="<?php echo site_url(empty($user->id) ? 'admin/users/create' : 'admin/users/update') ?>">
    <fieldset>
        <legend><?php echo empty($user->id) ? '新建' : '编辑' ?>用户</legend>
        <?php if (!empty($user->errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $user->errors) ?>
        </div>
        <?php endif ?>
        <input type="hidden" name="user[id]" value="<?php if (!empty($user->id)) echo $user->id ?>" />
        <div class="control-group">
            <label class="control-label">用户手机</label>
            <div class="controls">
                <?php echo $user->mobile ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">驾驶证号</label>
            <div class="controls">
                <?php echo $user->drive ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">激活时间</label>
            <div class="controls">
                <?php echo $user->created_at ?>
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label">登陆密码</label>
            <div class="controls">
                <input type="text" name="user[password]" />
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit"><?php echo empty($user->id) ? '创建' : '更新' ?></button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>