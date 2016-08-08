<?php// echo validation_errors(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优哒国际教育在线留言平台 | 留言成功</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>static/signin.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">优哒留言平台</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">优哒留言平台</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="http://www.njustar.cn/">返回首页</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/login/load_login">登录</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="text-align: center;">
        <div class="success" style="margin: 60px auto 0; width: 100px;"><img src="../../static/images/success.png" width=100% style="background-size: contain;"></div><br/>
        <h4 class="form-signin-heading">恭喜您已留言成功</h4>
        <h4 class="form-signin-heading">我们将在第一时间与您取得联系</h4><br/><br/>
        <button type="button" onclick="skip()" class="btn btn-primary" data-toggle="button">返回优哒首页</button>
    </div>

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://libs.useso.com/js/jquery/2.0.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>static/bootstrap/js/bootstrap.min.js"></script>

    <script>
        function skip()
        {
            window.location.href="http://www.njustar.cn/";
        }
    </script>

</body>
</html>


