<form class="form-horizontal" method="post" action="<?php echo site_url('login') ?>">
    <fieldset>
        <legend>激活您的景点手册</legend>
        <div class="control-group">
            <label for="user[email]" class="control-label"><span class="red_star">*</span>手册ID号</label>
            <div class="controls">
                <input type="text" name="user[email]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>手册随机号</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>驾驶证号</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>密码</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>确认密码</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="user[password]" class="control-label"><span class="red_star">*</span>手机号码</label>
            <div class="controls">
                <input type="password" name="user[password]" value="">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary btn-large" type="submit">立刻免费激活</button>
                <span style="color: #777; margin-left: 10px;">已激活？<a href="<?php echo site_url('login') ?>">登陆</a></span>
            </div>
        </div>
    </fieldset>
</form>