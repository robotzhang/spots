<form class="form-horizontal" method="post" action="<?php echo site_url(empty($topic) ? 'admin/topics/create' : 'admin/topics/update') ?>">
    <fieldset>
        <legend><?php echo empty($topic) ? '新建' : '编辑' ?>课堂</legend>
        <input type="hidden" name="topic[id]" value="<?php if (!empty($topic)) echo $topic->id ?>" />
        <div class="control-group">
            <label for="topic[name]" class="control-label">名称</label>
            <div class="controls">
                <input type="text" name="topic[name]" class="input-xxlarge" value="<?php if (!empty($topic)) echo $topic->name ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="topic[price]" class="control-label">价格</label>
            <div class="controls">
                <input type="text" name="topic[price]" class="input-xlarge" value="<?php if (!empty($topic)) echo $topic->price ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="topic[summry]" class="control-label">简介</label>
            <div class="controls">
                <textarea name="topic[summry]" class="input-xxlarge"><?php if (!empty($topic)) echo $topic->summry ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="topic[img]" class="control-label">封面图片</label>
            <div class="controls">
                <input type="text" name="topic[img]" class="input-xxlarge" value="<?php if (!empty($topic)) echo $topic->img ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn  btn-success" type="submit"><?php echo empty($topic) ? '创建' : '更新' ?></button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>