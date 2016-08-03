<?php echo validation_errors(); ?>
<?php echo $info; ?>
<li><a href="<?php echo base_url();?>index.php/admin/show_message">返回</a></li>
<li><a href="<?php echo base_url();?>index.php/admin/logout">登出</a></li>
<h1>新增管理员</h1>
<form action="<?php echo base_url();?>index.php/admin/add_admin" method="post" accept-charset="utf-8">
<label for="username">用户名</label>
<input type="text" name="username" /><br/>
<label for="password">密码</label>
<input type="password" name="password" /><br/>
<label for="passconf">密码确认</label>
<input type="password" name="passconf" /><br/>
<input type="submit" name="submit" value="提交" />
