<style type="text/css">
    .site { padding: 40px 0; height: 600px; *height: 520px; background: url(<?php echo base_url('/static/images/home/hero2.jpg') ?>) center 0px no-repeat; background-size: cover; }
    .active { padding: 10px; border-radius: 5px; background: #fff; background: none repeat scroll 0 0 rgba(255, 255, 255, 0.8); box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.4);
        width: 390px; float: right;
    }
    .active legend { margin-bottom: 10px; text-align: center; }
    .active .control-label { width: 100px; }
    .active .controls { margin-left: 120px; *margin-left: 0; }
</style>

<div class="active">
    <?php $this->load->view('users/activation_form.php'); ?>
</div>