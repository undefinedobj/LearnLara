<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
{{--    <meta id="token" name="token" value=" {{ csrf_token() }} ">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>表单提交Demo</title>
</head>
<body>
<form action="/demo/form/submit" method="POST">
    <input type="text" name="name" value="root"><br>
    <input type="text" name="password" value="123"><br>
{{--    {{ csrf_field() }}--}}
    <input type="submit">
</form>
</body>
</html>