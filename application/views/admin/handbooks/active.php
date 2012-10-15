<form class="form-horizontal" method="post" action="<?php echo site_url('admin/handbooks/active/'.$handbook->id)?>">
    <fieldset>
        <legend>激活景点手册</legend>
        <input type="hidden" name="user[is_validation]" value="Y" />
        <input type="hidden" name="user[password]" value="chinazjy" />
        <input type="hidden" name="user[repassword]" value="chinazjy" />
        <?php if (!empty($errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $errors) ?>
        </div>
        <?php endif ?>
        <div class="control-group">
            <label class="control-label">手册ID</label>
            <div class="controls">
                <?php echo $handbook->unique_id ?>
            </div>
        </div>
        <div class="control-group">
            <label for="user[mobile]" class="control-label">用户手机</label>
            <div class="controls">
                <input type="text" name="user[mobile]" class="input" value="<?php if(!empty($user->mobile)) echo $user->mobile ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="user[drive]" class="control-label">驾驶证号</label>
            <div class="controls">
                <input type="text" name="user[drive]" class="input" value="<?php if(!empty($user->drive)) echo $user->drive ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-success" type="submit">确定</button>
        </div>
    </fieldset>
</form>