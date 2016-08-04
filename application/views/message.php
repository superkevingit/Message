<?php// echo validation_errors(); ?>
<h1>快留言!</h1>
    <form action="<?php echo base_url('index.php/message/check_message');?>" method="post" accept-charset="utf-8">
    <label for="child_name">孩子姓名</label>
        <input type="text" name="child_name"/><br>
    <label for="parent_name">家长姓名</label>
        <input type="text" name="parent_name"/><br>
    <label for="tel">电话号码</label>
        <input type="text" name="tel"/><br/>

    小孩出生日期
    <select name='year'>
    <?php for ($year=1990; $year<=intval(date("Y")); $year++):;?>
        <option value="<?php echo $year;?>">
            <?php echo $year;?></option>
    <?php endfor ;?>
    </select>

    <select name='month'>
    <?php for ($month=1; $month<=12; $month++):;?>
        <option value="<?php echo $month;?>"><?php echo $month;?></option>
    <?php endfor ;?>
    </select>

    <select name='day'>
    <?php for ($day=1; $day<=31; $day++):;?>
        <option value="<?php echo $day;?>"><?php echo $day;?></option>
    <?php endfor ;?>
    </select>
    </br>

    <label for="requirement">体验要求</label>
        <textarea name="requirement"></textarea>
    </br>

    <input type="submit" value="提交"/>
    </form>
