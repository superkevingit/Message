<?php echo validation_errors(); ?>
<?php echo $info;?>
<title>登陆</title>
    <form action="<?php echo base_url('index.php/login/check_login');?>" method="post" accept-charset="utf-8">
        <label for="username">用户名</label>
            <input type="input" name="username" /><br/>
        <label for="password">密码</label>
            <input type="password" name="password" /><br/>
        <input type="submit" name="submit" value="提交" />
    </form>
