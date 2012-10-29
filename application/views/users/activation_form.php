<form class="form-horizontal" method="post" action="<?php echo site_url('users/activation') ?>">
    <fieldset>
        <legend>激活您的景点手册</legend>
        <div class="row">
            <div class="span6">
                <?php if (!empty($errors)): ?>
                <div class="control-group">
                    <div class="errors"><?php echo join('<br>', $errors) ?></div>
                </div>
                <?php endif ?>
                <div class="control-group">
                    <label for="handbook[unique_id]" class="control-label"><span class="red_star">*</span>手册ID号</label>
                    <div class="controls">
                        <input type="text" name="handbook[unique_id]" value="<?php if(!empty($handbook)) echo $handbook['unique_id'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="user[drive]" class="control-label"><span class="red_star">*</span>驾驶证号</label>
                    <div class="controls">
                        <input type="text" name="user[drive]" value="<?php if(!empty($user)) echo $user['drive'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="user[password]" class="control-label"><span class="red_star">*</span>登录密码</label>
                    <div class="controls">
                        <input type="password" name="user[password]" value="<?php if(!empty($user)) echo $user['password'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="user[repassword]" class="control-label"><span class="red_star">*</span>确认密码</label>
                    <div class="controls">
                        <input type="password" name="user[repassword]" value="<?php if(!empty($user)) echo $user['repassword'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="user[mobile]" class="control-label"><span class="red_star">*</span>手机号码</label>
                    <div class="controls">
                        <input type="text" name="user[mobile]" value="<?php if(!empty($user)) echo $user['mobile'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-primary btn-large" type="submit">立刻免费激活</button>
                        <span style="color: #777; margin-left: 10px;">已激活？<a href="<?php echo site_url('login') ?>">登录</a></span>
                    </div>
                </div>

                <div class="fs12 mt10">
                    <p>注意事项</p>
                    1.	本手册里所收集所有参与此次活动的4A/5A景区正价门票，通过自驾游“1+2”的模式，持手册者与同行者统一按优惠方式（折扣率）购票等，持手册者最多带2个同行者，额外多出人员按景区实际价格购买门票。<br>
                    2.	本手册含防伪信息，请在进入景区前，到景区售票处进行防伪验证，而后即可享受相应优惠。<br>
                    3.	本手册持有者在使用前均要在官方网站进行注册，捆绑使用者的姓名，驾驶证号码与车牌号码。<br>
                    4.	本手册内景区最多享受三次优惠门票打折服务。<br>
                    5.	本手册有效期是3年，遇到景区免门票的情况，手册使用者同样享受景区的最新优惠政策。（景区<点>介绍里有黄金周不可以使用及其他对有效期作出说明的除外。）<br>
                    6.	本手册只体现打折信息或优惠的门票价格。<br>
                    7.	请在使用本手册前认真阅读本手册使用说明，看清优惠政策及有效时间。<br>

                    备注：<br>
                    若加盟景区（点）发生破产、转让、景区改造或政策变化等特殊情况，本手册持有者可能会失去优惠权益，本手册发行方免责。若景区门票及服务价格发生变动，以景区公示价格为准。<br>
                </div>
            </div>
            <div class="span6">
                <img src="<?php echo base_url('static/images/common/howto.png') ?>" />
            </div>
        </div>
    </fieldset>
</form>