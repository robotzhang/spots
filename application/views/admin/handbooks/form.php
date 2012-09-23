<form class="form-horizontal" method="post" action="<?php echo site_url(empty($handbook) ? 'admin/handbooks/create' : 'admin/handbooks/update') ?>">
    <fieldset>
        <legend><?php echo empty($handbook) ? '新建' : '编辑' ?>景点手册</legend>
        <input type="hidden" name="handbook[id]" value="<?php if (!empty($handbook)) echo $handbook->id ?>" />
        <div class="control-group">
            <label for="handbook[unique_id]" class="control-label">手册ID</label>
            <div class="controls">
                <input type="text" name="handbook[unique_id]" class="input" value="<?php if (!empty($handbook)) echo $handbook->unique_id ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-success" type="submit"><?php echo empty($handbook) ? '创建' : '更新' ?></button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>