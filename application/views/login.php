<?php // echo validation_errors(); ?>
<?php // echo $info;?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优哒留言后台管理 | 管理员登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    <li>
                        <a href="<?php echo base_url();?>index.php/admin/logout">注销</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br/>

        <form class="form-signin" action="<?php echo base_url();?>index.php/login/check_login" method="post" accept-charset="utf-8">
	        <label for="username">用户名</label>
	            <input  class="form-control" type="input" name="username" /><br/>
	        <label for="password">密码</label>
	            <input  class="form-control" type="password" name="password" /><br/>
	        <button type="submit" class="btn btn-lg btn-primary btn-block">登录</button><br/><br/><br/>
	    </form>


    </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://libs.useso.com/js/jquery/2.0.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>static/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
