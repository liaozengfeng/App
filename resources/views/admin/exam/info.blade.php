<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>标题</td>
            <td>{{ $info['title'] }}</td>
        </tr>
        <tr>
            <td>内容</td>
            <td>{{ $info['content'] }}</td>
        </tr>
        <tr>
            <td>图片</td>
            <td><img src="{{ $info['img'] }}" width="200px" alt=""></td>
        </tr>
        <tr>
            <td>发布时间</td>
            <td>{{ $info['pdate'] }}</td>
        </tr>

    </table>
</body>
</html>