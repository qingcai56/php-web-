<?php
require_once('mysql.php');
if (!$_SESSION['username']) {
    exit('<script>alert("当前用户未登录");window.location.href="login.php"</script>');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
    <meta charset="utf-8" />
        <title>Post Bar</title>
        <!-- <script src="scripts/modernizr-1.6.min.js"></script> -->
        <link rel="stylesheet" media="screen" href="css/basic.css" />
        <style>
             input[type=text], select {
                width: 300px;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                }

            input[type=submit] {
            width: 300px;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            input[type=submit]:hover {
            background-color: #45a049;
            }
        </style>
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
        <div align="center">
            <h1 style="color:#336699">Post lists</h1>
            <br>
            <br>
                    <table width="1000px" border="1">
                        <tr>
                            <td width="100">用户名</td>
                            <td width="400">标题 - 内容</td>
                        </tr>
                        <?php
                        $pagesize = 5;  # 页面大小
                        $p = 1;  # 当前页面
                        $offset = ($p - 1) * $pagesize;  # 页面指针
                        # 查询本页显示的数据
                        $sql = "select * from articleList,userlist where articleList.uid=userlist.uid order by addtime desc limit $offset,$pagesize";
                        $list = $db->getRows($sql);
                        foreach ($list as $k => $one) {
                            ?>
                            <tr>  <!-- 表格 -->
                                <td>
                                    <?php echo $one['nickname']; ?>
                                </td>
                                <td>
                                    <?php echo $one['title'] . "<br>"; ?>
                                    <?php echo $one['content']; ?>
                                    <div style="text-align:right;">
                                        <a href="comment.php?aid=<?php echo $one['aid']; ?>">进入</a>
                                        <?php echo date("Y-m-d H:i:s", $one['addtime']); ?><?php
                                        if ($one['uid'] == $_SESSION['uid']) {
                                            ?>
                                            <a href="postBar_update.php?aid=<?php echo $one['aid'] ?>">编辑</a>
                                            <a href="postBar_delete.php?aid=<?php echo $one['aid'] ?>">删除</a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
        </div>
        <div align="center">
            <?php
            # 分页代码
            # 计算留言总数
            $sql = "select count(*) as count from articleList,userlist where articleList.uid=userlist.uid";
            $lists = $db->getRows($sql);
            $lists = $lists[0];
            # 计算总页数
            $pagenum = ceil($lists['count'] / $pagesize);
            echo '共', $lists['count'], '条留言';
            echo '<br>';
            echo '<a href="postBar.php?p=1">首页</a>';
            echo '  ';
            echo '<a href="postBar.php?p=', $p == 1 ? 1 : ($p - 1), '">上一页</a>';
            echo '  ';
            # 循环输出个页数及链接
            if ($pagenum >= 1) {
                for ($i = 1; $i <= $pagenum; $i++) {
                    if ($i == $p) {
                        echo '[', $i, ']';
                        echo '  ';
                    } else {
                        echo ' <a href="postBar.php?p=', $i, '">', $i, '</a>';  # p = i
                        echo '  ';
                    }
                }
            }
            echo '<a href="postBar.php?p=', $p == $pagenum ? $pagenum : ($p + 1), '">下一页</a>';  # 避免超出页数范围
            echo '  ';
            echo '<a href="postBar.php?p=', $pagenum, '">尾页</a>';
            ?>
        </div>
        <div align="center">
            <form action="postBar_add.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" id="title" name="title" placeholder="标题"></textarea>
                </div>
                <br>
                <div>
                    <textarea type="text" id="textbox" name="new_introduce" style="border:3;border-radius:5px;background-color:rgba(241,241,241,.98);width: 650px; height: 200px;padding: 10px;resize: none" placeholder="说点什么吧"></textarea>
                </div>
                <div>
                    <input type="submit" name="submit" id="submit" value="发表">
                </div>
            </form>
        </div>
    </article>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
      <script>
        L2Dwidget.init({
          "model": { "jsonPath":"https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json", "scale": 1, "hHeadPos":0.5, "vHeadPos":0.618 },
          "display": { "position": "right", "width": 200, "height": 200, "hOffset": 0, "vOffset": 0 },
          "mobile": { "show": true, "scale": 0.5 },
          "react": { "opacityDefault": 0.7, "opacityOnHover": 0.2 }
        });
      </script>
</body>
</html>