<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山寨版 laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-offset-2" role="main">
            <h1>题目：</h1>
            <h4>请写一个函数来检查用户提交的数据是否为整数（不区分数据类型，可以为二进制、八进制、十进制、十六进制数字）</h4>
            <form action="/interview/response-total" method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Tel</label>
                    <div class="col-sm-10">
                        <input name="jp_total" type="tel" class="form-control" id="inputPassword" placeholder="请输入整数或字符">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>