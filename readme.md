# url
留言页
localhost/message/index.php

后台页
localhost/message/index.php/admin/show_message

登陆页
localhost/message/index.php/login/load_login

# 配置文件
数据库
message/application/config/database.php
修改hostname、username、password

# 数据库文件
hdm128467458_db.sql
直接导入

# 测试数据
最高权限root 123
普通管理员 test test

# 模板文件
message/application/view/

# 静态文件（css，js）
message/static/

# 静态文件路径填写
<?php echo base_url();?>static/css...
