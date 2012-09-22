<?php
$action = $this->uri->segment(1);
$action_next = $this->uri->segment(2);
?>
<!DOCTYPE>
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

<body>
  <?php $this->load->view('common/header.php'); ?>

  <div class="site">
      <div class="container">
        <?php echo $layout['content']; ?>
      </div>
  </div>

  <?php $this->load->view('common/footer.php'); ?>

  <div class="sider_tool">
      <ul class="unstyled">
          <li title="意见反馈"><a href="<?php echo site_url('about/feedback') ?>"><img src="<?php echo base_url('static/images/common/feedback.png') ?>" alt="feedback"/></a></li>
          <li title="反馈顶部"><a href="javascript:window.scrollTo(0,0);"><img src="<?php echo base_url('static/images/common/to_top.png') ?>" alt="to_top"/></a></li>
          <li title="在线咨询">
              <a href="http://wpa.qq.com/msgrd?v=3&uin=1613847076&site=qq&menu=yes"><img border="0" src="<?php echo base_url('static/images/common/qq.png') ?>" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
          </li>
      </ul>
  </div>
</body>
</html>