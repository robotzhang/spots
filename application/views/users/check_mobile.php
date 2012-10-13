<form class="form-horizontal" method="post" action="<?php echo site_url('users/check_mobile') ?>">
    <fieldset>
        <legend>一切都准备好了，验证手机有效性</legend>
        <input type="hidden" name="mobile" value="<?php echo $form['mobile'] ?>" />
        <input type="hidden" name="unique_id" value="<?php echo $form['unique_id'] ?>" />
        <?php if (!empty($errors)): ?>
        <div class="control-group">
            <div class="errors"><?php echo join('<br>', $errors) ?></div>
        </div>
        <?php endif ?>
        <div class="control-group">
            <label for="code" class="control-label"><span class="red_star">*</span>验证码</label>
            <div class="controls">
                <input type="text" name="code" value="">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" type="submit">确定</button>
                <button style="margin-left: 20px;" disabled="disabled" id="timer" type="button">(<span class="second">60</span>)秒之后重新发送</button>
            </div>
        </div>
    </fieldset>
</form>
<script>
    var timer = null;
    function set_timer() {
        return  setInterval(function(){
            var second = parseInt($('#timer .second').text()) - 1;
            if (second < 0) {
                $('#timer').removeAttr('disabled').text('重新发送验证码');
                clearInterval(timer);
            } else {
                $('#timer .second').text(second);
            }
        }, 1000);
    }
    $(document).ready(function() {
        var init_text = $('#timer').html();
        timer = set_timer();
        $('#timer').click(function() {
            $('#timer').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo site_url("users/resend") ?>',
                data: {mobile: $('form').find('input[name="mobile"]').val()},
                success: function(res) {
                    if (res.success) {
                        $('#timer').attr('disabled', 'disabled').html(init_text);
                        timer = set_timer();
                    } else {
                        $('#timer').attr('disabled', 'disabled').html(res.message);
                    }
                }
            });
        });
    });
</script>