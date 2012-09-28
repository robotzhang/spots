<?php
$action = $this->uri->segment(1);
$action_next = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo $layout['description']; ?>" />
  <meta name="keywords" content="<?php echo $layout['keywords']; ?>" />
  <title><?php echo $layout['title']; ?></title>
  <link href="<?php echo base_url('static/images/favicon.png'); ?>" type="image/x-icon" rel="icon">
  <link rel="stylesheet" href="http://lib.sinaapp.com/js/bootstrap/2.0.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url('static/stylesheets/global.css'); ?>" />
  <script src="http://lib.sinaapp.com/js/jquery/1.8/jquery.min.js"></script>
  <?php
  if (!empty($layout['css'])) {
      foreach ($layout['css'] as $css) {
          echo '<link rel="stylesheet" type="text/css" href="'.$css.'" />';
      }
  }

  if (!empty($layout['javascript'])) {
      foreach ($layout['javascript'] as $javascript) {
          echo '<script src="'.$javascript.'"></script>';
      }
  }
  ?>
</head>

<body id="my" style="background: url(<?php echo base_url('static/images/my/bg_body.jpg') ?>) 0 0 repeat;">
    <div class="site" style="background: url(<?php echo base_url('static/images/my/bg_site.jpg') ?>) center 0 no-repeat;">
      <div class="container" style="height: 600px;">
          <div style="margin-top: -30px; margin-bottom: 20px;">
              <a href="<?php echo site_url('') ?>"><img src="<?php echo base_url('static/images/logo.png') ?>"></a>
          </div>
          <div style="border: #E6E6E6 1px solid; border-radius: 5px; padding: 15px;">
              <?php echo $layout['content']; ?>
          </div>
      </div>
    </div>

    <?php $this->load->view('common/footer.php'); ?>
</body>
</html>