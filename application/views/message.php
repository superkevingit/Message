<?php
$errors = explode("\n",validation_errors());
unset($errors[count($errors) - 1]);
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优哒国际教育在线留言平台</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br/>

	<?php if($errors):;?>
	<?php foreach($errors as $error):;?>
	<div class="alert alert-warning alert-dismissble" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo $error;?>
	</div>
	<?php endforeach;?>
	<?php endif ;?>

        <form class="form-signin" action="<?php echo base_url('index.php/message/check_message');?>" method="post" accept-charset="utf-8">
            <h1 class="form-signin-heading">填写相关信息</h1>
            <h1 class="form-signin-heading">我们将尽快联系您</h1><br/><br/>
            <label for="child_name">孩子姓名</label>
                <input class="form-control" type="text" name="child_name"/><br>
            <label for="parent_name">家长姓名</label>
                <input class="form-control" type="text" name="parent_name"/><br>
            <label for="tel">家长电话</label>
                <input class="form-control" type="text" name="tel"/><br/>

            <label for="birth">孩子出生日期</label>
            <div class="row">
                <div class="col-xs-4">
                    <select class="form-control" name='year'>
                    <?php for ($year=1990; $year<=intval(date("Y")); $year++):;?>
                        <option value="<?php echo $year;?>">
                            <?php echo $year;?></option>
                    <?php endfor ;?>
                    </select>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name='month'>
                    <?php for ($month=1; $month<=12; $month++):;?>
                        <option value="<?php echo $month;?>"><?php echo $month;?></option>
                    <?php endfor ;?>
                    </select>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name='day'>
                    <?php for ($day=1; $day<=31; $day++):;?>
                        <option value="<?php echo $day;?>"><?php echo $day;?></option>
                    <?php endfor ;?>
                    </select>
                </div>
            </div><br/>


            <label for="requirement">体验要求</label>
                <textarea class="form-control" rows="3" name="requirement"></textarea><br/><br/>

            <button type="submit" class="btn btn-lg btn-primary btn-block">提交</button><br/><br/><br/>
        </form>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://libs.useso.com/js/jquery/2.0.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>static/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>


