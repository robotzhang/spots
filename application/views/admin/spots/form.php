<form class="form-inline" method="post" action="<?php echo site_url(empty($spot->id) ? 'admin/spots/create' : 'admin/spots/update') ?>">
    <fieldset>
        <legend><?php echo empty($spot->id) ? '新建' : '编辑' ?>景点</legend>
        <?php if (!empty($spot->errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $spot->errors) ?>
        </div>
        <?php endif ?>
        <input type="hidden" name="spot[id]" value="<?php if (!empty($spot->id)) echo $spot->id ?>" />
        <div class="control-group">
            <label for="spot[name]" class="control-label">景点名称</label>
            <div class="controls">
                <input type="text" name="spot[name]" class="input-xxlarge" value="<?php if (!empty($spot)) echo $spot->name ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="spot[province]" class="control-label">所属省份</label>
            <div class="controls">
                <input type="text" name="spot[province]" class="input-xxlarge" value="<?php if (!empty($spot)) echo $spot->province ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="spot[introduce]" class="control-label">景点介绍</label>
            <div class="controls">
                <textarea id="editor" style="width: 100%;" class="input-xxlarge" rows="5" name="spot[introduce]"><?php if (!empty($spot)) echo $spot->introduce ?></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit"><?php echo empty($spot->id) ? '创建' : '更新' ?></button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>

<script charset="utf-8" src="<?php echo base_url('static/javascripts/plugins/kindeditor/kindeditor.js') ?>"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('#editor', { uploadJson: '<?php echo site_url('admin/admin/upload') ?>', height: 400 });
    });
</script>