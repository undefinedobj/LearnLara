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

            <h1>在山寨版 laravel 应用中配置使用阿里云提供的短信服务</h1>
            <form action="/alisms" method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Tel</label>
                    <div class="col-sm-10">
                        <input name="tel" type="tel" class="form-control" id="inputPassword" placeholder="Tel">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>