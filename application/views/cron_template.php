<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title><?php echo config()->PROJECT_NAME; ?></title>
 </head>
 <body>
  <header id="header">
   <a href="/"><?php echo config()->PROJECT_NAME; ?></a>
   </div>
  </header>
  <div id="wrapper">
   <div id="page">
    <div id="content">
     <div class="box">
      <?php if(!empty($content_view)) include 'application/views/'.$content_view; ?>
     </div>
     <br class="clearfix" />
    </div>
    <br class="clearfix" />
   </div>
  </div>
  <footer id="footer">
   <a href="https://github.com/zxzharmlesszxz/"><?php echo config()->PROJECT_NAME; ?></a> - <?php echo config()->PROJECT_VERSION; ?> &copy; 2015-<?php echo date("Y"); ?>
  </footer>
 </body>
</html>
