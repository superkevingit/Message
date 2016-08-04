<?php if ($root):;?>
<li><a href="<?php echo base_url('index.php/admin/add_admin');?>">添加管理员</a></li>
<?php endif; ?>

<li><a href="<?php echo base_url('index.php/admin/logout');?>">登出</a></li>

<h1>后台留言</h1>
<?php foreach ($message as $message_item): ?>
    <li>孩子姓名:<?php echo $message_item['child_name'];?></li>
    <li>家长姓名:<?php echo $message_item['parent_name'];?></li>
    <li>电话号码:<?php echo $message_item['tel'];?></li>
    <li>孩子出生年月:<?php echo $message_item['child_birth'];?></li>
    <li>体检要求:<?php echo $message_item['requirement'];?></li>
    <li>留言时间:<?php echo $message_item['message_time'];?></li>
    <li><a href="<?php echo base_url();?>index.php/admin/del_message/<?php echo $message_item['id'];?>">删除留言</a></li>
    </br>
<?php endforeach; ?>
