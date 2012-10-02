<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>有错误发生</title>
    <style type="text/css">
        .container { margin: 0 auto; width: 960px; font-size: 14px; }
        h1 { font-size: 18px; color: #D66519; }
        a { color: #4183C4; text-decoration: none; }
        a:hover{ text-decoration: underline; }
    </style>
</head>
<body>
	<div class="container">
        <div style="margin-top: 100px;">
            <h1><?php echo $heading; ?></h1>
            <?php echo $message; ?>
            <div style="font-size: 12px;">
                您也可以：<a href="<?php echo site_url('') ?>">返回首页</a>
            </div>
        </div>
	</div>
</body>
</html>