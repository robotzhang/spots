<form class="form-horizontal" method="post" action="<?php echo site_url('users/activation') ?>">
    <fieldset>
        <legend>激活您的景点手册</legend>
        <div class="control-group">
            <label for="handbook[unique_id]" class="control-label"><span class="red_star">*</span>手册ID号</label>
            <div class="controls">
                <input type="text" name="handbook[unique_id]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[drive]" class="control-label"><span class="red_star">*</span>驾驶证号</label>
            <div class="controls">
                <input type="text" name="user[drive]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>登录密码</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[repassword]" class="control-label"><span class="red_star">*</span>确认密码</label>
            <div class="controls">
                <input type="password" name="user[repassword]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[mobile]" class="control-label"><span class="red_star">*</span>手机号码</label>
            <div class="controls">
                <input type="text" name="user[mobile]" value="">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary btn-large" type="submit">立刻免费激活</button>
                <span style="color: #777; margin-left: 10px;">已激活？<a href="<?php echo site_url('login') ?>">登录</a></span>
            </div>
        </div>
    </fieldset>
</form>