<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="css/iconfont.css">
    <title>register</title>
</head>
<body>
    <img src="img/login_img/bg.png" alt="" class="wave">
    <div class="container">
        <div class="img">
            <img src="img/login_img/img-3.svg" alt="">
        </div>
        <div class="login-box">
            <form action="register_do.php" method="post">
                <img src="img/login_img/avatar.svg" alt="" class="avatar">
                <h3>Create your account</h3>
                <div class="input-group">
                    <div class="icon">
                        <span class="iconfont icon-zhanghao"></span>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input type="text" class="input" id="username" name="username" list="username" required="required">
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <span class="iconfont icon-mima"></span>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input type="password" class="input" id="password" name="password"  required="required">
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <span class="iconfont icon-mima"></span>
                    </div>
                    <div>
                        <h5>Repassword</h5>
                        <input type="password" class="input" id="repassword" name="repassword" required="required">
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <span class="iconfont icon-renqun"></span>
                    </div>
                    <div>
                        <h5>nickname</h5>
                        <input type="text" class="input" id="nickname" name="nickname" required="required">
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <span class="iconfont icon-youxiang"></span>
                    </div>
                    <div>
                        <h5>email</h5>
                        <input type="text" class="input" id="email" name="eamil" list="username" required="required">
                    </div>
                </div>
                <input type="submit" class="btn" value="Sign Up">
            </form>
        </div>
    </div>
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>