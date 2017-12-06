<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
<h2><font color="red">你的所有信息注册成功</font></h2>
<table>
    <th>ID</th>
    <th>手机号</th>
    <th>密码</th>
    <th>昵称</th>
    <th>生日</th>
    <th>地址</th>
    <?php foreach($data as $k=>$v):?>
    <tr>
        <td><?=$v['id']?></td>
        <td><?=$v['mobile']?></td>
        <td><?=$v['pwd']?></td>
        <td><?=$v['name']?></td>
        <td><?=$v['brthd']?></td>
        <td><?=$v['site']?></td>
    </tr>
    <?php endforeach?>
</table>
    <h2><a href="?r=zk/index"><font color="blue">返回注册页面</font></a></h2>
</center>
</body>
</html>