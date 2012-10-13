<form class="form-horizontal" method="post" action="<?php echo site_url('partners/tickets/sale') ?>">
    <fieldset>
        <legend>售票</legend>
        <?php if (!empty($errors)): ?>
        <div class="errors mb20">
            <?php echo join('<br>', $errors) ?>
        </div>
        <?php endif ?>
        <div class="control-group">
            <label for="ticket[spot_id]" class="control-label">所属景点</label>
            <div class="controls">
                <span><?php echo $spots[0]->name ?></span>
                <input type="hidden" name="ticket[spot_id]" value="<?php echo $spots[0]->id ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="mobile" class="control-label">用户手机</label>
            <div class="controls">
                <input type="text" name="mobile" class="input" value="">
            </div>
        </div>
        <div class="control-group">
            <label for="ticket[handbook_unique_id]" class="control-label">手册id</label>
            <div class="controls">
                <input type="text" name="ticket[handbook_unique_id]" class="input" value="">
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit">确定</button>
            <button class="btn" type="reset">取消</button>
        </div>
    </fieldset>
</form>

<?php $message = $this->session->flashdata('message'); ?>
<?php if (!empty($message)): ?>
<div class="flash_message"><?php echo $message; ?></div>
<script>
    $(document).ready(function(){
        $('.flash_message').animate({top: 1},function(){
            setTimeout(function() {
                $('.flash_message').fadeOut();
            }, 1000)
        });
    });
</script>
<?php endif ?>