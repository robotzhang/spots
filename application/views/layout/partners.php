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
  <link rel="stylesheet" href="<?php echo base_url('static/stylesheets/application.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('static/stylesheets/global.css'); ?>" />
  <script src="<?php echo base_url('static/javascripts/jquery.js') ?>"></script>
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

<body id="partners">

    <div class="header">
        <div class="container">
            <div class="pull-left">
                <a style="color: #fff; font-size: 20px;" href="<?php echo site_url('partners') ?>">chinazjy.org</a>
            </div>
            <div class="pull-right">
                欢迎：
                <a href="<?php echo site_url('partners/settings') ?>" title="设置"><?php echo current_partner()->name ?><i class="icon-cog icon-white"></i></a>
                -
                <a href="<?php echo site_url('partners/logout') ?>">退出<i class="icon-off icon-white"></i></a>
            </div>
        </div>
    </div>

    <div class="site">
        <div class="container clearfix">
            <div class="row">
                <div class="span9">
                    <div class="content" style="min-height: 500px;">
                        <?php echo $layout['content']; ?>
                    </div>
                </div>
                <div class="span3">
                    <div class="side_module">
                        <?php $this->load->view('partners/_menu'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('common/footer.php'); ?>

    <div class="sider_tool" style="display: none;">
      <ul class="unstyled">
          <li title="意见反馈"><a href="<?php echo site_url('about/feedback') ?>"><img src="<?php echo base_url('static/images/common/feedback.png') ?>" alt="feedback"/></a></li>
          <li title="返回顶部"><a href="javascript:window.scrollTo(0,0);"><img src="<?php echo base_url('static/images/common/to_top.png') ?>" alt="to_top"/></a></li>
          <!--li title="在线咨询">
              <a href="http://wpa.qq.com/msgrd?v=3&uin=1613847076&site=qq&menu=yes"><img border="0" src="<?php echo base_url('static/images/common/qq.png') ?>" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
          </li-->
      </ul>
    </div>
</body>
</html>