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
            <td>ID</td>
            <td>标题</td>
            <td>图片</td>
            <td>发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($info as $v)
            <tr>
                <td>{{ $v['id'] }}</td>
                <td>{{ $v['title'] }}</td>
                <td><img src="{{ $v['img'] }}" width="100px" alt=""></td>
                <td>{{ $v['pdate'] }}</td>
                <td><a href="/info?id={{ $v['id'] }}">查看</a></td>
            </tr>
        @endforeach
    </table>
    {{ $info->links() }}
</body>
</html>