<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo $layout['description']; ?>" />
  <meta name="keywords" content="<?php echo $layout['keywords']; ?>" />
  <title><?php echo $layout['title']; ?></title>
  <link href="<?php echo base_url('static/images/favicon.png'); ?>" type="image/x-icon" rel="icon">
  <link rel="stylesheet" href="<?php echo base_url('static/stylesheets/mini.css'); ?>" />
</head>

<body>
    <div class="site">
        <?php echo $layout['content']; ?>
    </div>
    <div class="footer">
        ©2012 chinazjy.org All rights reserved.
        <a href="<?php echo site_url() ?>">返回网站首页</a>
    </div>
</body>
</html>