<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优哒国际教育在线留言平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>static/signin.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap-table/1.4.0/bootstrap-table.min.css" rel="stylesheet">
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
                    <?php if ($root):;?>
					<li>
						<a href="<?php echo base_url();?>index.php/admin/add_admin">添加管理员</a>
					</li>
					<?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px;">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>孩子姓名</th>
                    <th>家长姓名</th>
                    <th>电话号码</th>
                    <th>孩子出生年月</th>
                    <th>体检要求</th>
                    <th>留言时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <?php foreach ($data['list'] as $message_item): ?>
                <tr>
                    <th style="max-width: 300px;"><?php echo $message_item['child_name'];?></th>
                    <th style="max-width: 300px;"><?php echo $message_item['parent_name'];?></th>
                    <th style="max-width: 300px;"><?php echo $message_item['tel'];?></th>
                    <th style="max-width: 300px;"><?php echo $message_item['child_birth'];?></th>
                    <th style="max-width: 300px;"><?php echo $message_item['requirement'];?></th>
                    <th style="max-width: 300px;"><?php echo $message_item['message_time'];?></th>
                    <th style="max-width: 300px;"><a href="<?php echo base_url();?>index.php/admin/del_message/<?php echo $message_item['id'];?>">删除</a></th>
                </tr>
                <?php endforeach; ?>
            </table>

		</div>
		<div style="margin-left:auto;margin-right:auto"><?php echo $data['page_list'];?></div>

        
    </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://libs.useso.com/js/jquery/2.0.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap-table/1.4.0/bootstrap-table.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>static/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
