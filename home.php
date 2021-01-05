<?php
require_once('mysql.php');
?>


<html>
    <head>
      <meta charset="utf-8" />
      <title>CQUPT Make Friend Post Bar</title>
      <!-- <script src="scripts/modernizr-1.6.min.js"></script> -->
      <link rel="stylesheet" media="screen" href="css/basic.css" />
    </head>
    <body>
      <header>
        <div>
          <img src="img/blog_header.png" alt="blog_log"  width="350px" height="250px">
          <div style="float: right;width: 550px; height:250px;">
            <h1 style="position: relative; top: 40%; right: 40%; color:#336699;">CQUPT Make Friend Post Bar </h1>
          </div>
        </div>
        <div>
          <nav>
            <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="postBar.php">Post Bar</a></li>
              <li><a href="video.php">Have a fun</a></li>
              <li><a href="userinfo.php">User Information</a></li>
              <li><a href="quit.php">Logout</a></li>
            </ul>
          </nav>
       </div>
      </header>
      <article>
        <h1>Dear,<?php echo $_SESSION['nickname'] ?></h1>
        <br>
        <p id="intro"> Welcome to the Post Bar of CQUPT. Here, you can make different friends by hobbies and problems。
          <ul>
            <li>
              <a href="postBar.php">Post Bar</a>
            </li>
            <li>
              <a href="video.php">Have a fun</a>
            </li>
            <li>
              <a href="userinfo.php">User Information</a>
            </li>
          </ul>
          <h3>Come on , play with us</h3>
          <br>
          <br>
          <p style="float: right;">The web site developed by qingcai56、yulong、luolin</p>
      </article>
      <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
      <script>
        L2Dwidget.init({
          "model": { "jsonPath":"https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json", "scale": 1, "hHeadPos":0.5, "vHeadPos":0.618 },
          "display": { "position": "right", "width": 400, "height": 400, "hOffset": 0, "vOffset": 0 },
          "mobile": { "show": true, "scale": 0.5 },
          "react": { "opacityDefault": 0.7, "opacityOnHover": 0.2 }
        });
      </script>
      <!-- <script src="scripts/global.js"></script> -->
    </body>
    </html>

