<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title><?php echo config()->PROJECT_NAME; ?></title>
  <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css" />
  <link rel="stylesheet/less" type="text/css" href="/less/style.less">
  <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/js/html5shiv.js"></script>
  <script type="text/javascript" src="/js/less.js"></script>
  <script type="text/javascript" src="/js/gamesmonitoring.js"></script>
  <script type="text/javascript" src="/js/tabs.js"></script>
 </head>
 <body>
  <header id="header">
   <div id="logo">
    <a href="/"><?php echo config()->PROJECT_NAME; ?></a>
   </div>
   <nav id="menu">
    <menu>
     <li><a href="/">Main</a></li>
     <li><a href="/admins">Admins</a></li>
     <li><a href="/users">Users</a></li>
     <li><a href="/servers">Servers</a></li>
     <li><a href="/games">Games</a></li>
     <li><a href="/modes">Modes</a></li>
     <li><a href="/contacts">Contacts</a></li>
    </menu>
    <br class="clearfix" />
   </nav>
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
   <div id="page-bottom">
    <div id="page-bottom-sidebar">
     <h3>Contacts</h3>
     <ul class="list">
      <li class="last">email: zxzharmlesszxz@gmail.com</li>
     </ul>
    </div>
    <div id="page-bottom-content">
     <h3>About</h3>
     <p>
      Empty yet
     </p>
    </div>
    <br class="clearfix" />
   </div>
  </div>
  <footer id="footer">
   <a href="https://github.com/zxzharmlesszxz/"><?php echo config()->PROJECT_NAME; ?></a> - <?php echo config()->PROJECT_VERSION; ?> &copy; 2015-<?php echo date("Y"); ?>
  </footer>
 </body>
 <script type="application/javascript" src="js/implementations.js"></script>
</html>
