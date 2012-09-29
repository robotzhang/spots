<form class="form-horizontal" method="post" action="<?php echo site_url('users/activation') ?>">
    <fieldset>
        <legend>一切都准备好了，验证手机有效性</legend>
        <input type="hidden" name="mobile" value="<?php echo $this->input->get('mobile') ?>" />
        <input type="hidden" name="unique_id" value="<?php echo $this->input->get('unique_id') ?>" />
        <div class="control-group">
            <label for="code" class="control-label"><span class="red_star">*</span>验证码</label>
            <div class="controls">
                <input type="text" name="code" value="">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" type="submit">确定</button>
                <button style="margin-left: 20px;" disabled="disabled">(60)秒之后重新发送</button>
            </div>
        </div>
    </fieldset>
</form>