<form class="form-horizontal" method="post" action="<?php echo site_url(empty($partner->id) ? 'admin/partners/create' : 'admin/partners/update') ?>">
    <fieldset>
        <legend><?php echo empty($partner->id) ? '新建' : '编辑' ?>景区账号</legend>
        <?php if (!empty($partner->errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $partner->errors) ?>
        </div>
        <?php endif ?>
        <input type="hidden" name="partner[id]" value="<?php if (!empty($partner->id)) echo $partner->id ?>" />
        <div class="control-group">
            <label for="partner[name]" class="control-label">账号</label>
            <div class="controls">
                <input type="text" name="partner[name]" class="input" value="<?php if (!empty($partner)) echo $partner->name ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="partner[password]" class="control-label">密码</label>
            <div class="controls">
                <input type="password" name="partner[password]" class="input" value="">
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit"><?php echo empty($partner->id) ? '创建' : '更新' ?></button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>