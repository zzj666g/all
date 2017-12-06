
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
<table border="1">
    <th>ID</th>
    <th>户名</th>
    <th>密码</th>
    <th>内容</th>
    <th>操作</th>
    <?php foreach($data as $k =>$v):?>
        <tr>
            <td><?=$v['id']?></td>
            <td><?=$v['name']?></td>
            <td><?=$v['pwd']?></td>
            <td><?=$v['content']?></td>
            <td><a href="?r=admin/del&id=<?=$v['id']?>">删除</a>||<a href="?r=admin/update&id=<?=$v['id']?>">修改</a></td>
        </tr>
    <?php endforeach?>
</table>
<a href="?r=admin/login">登录</a>
<a href="?r=admin/ad">添加</a>
</center>
</body>
</html>


