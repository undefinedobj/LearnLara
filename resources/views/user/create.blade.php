<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>表单提交Demo</title>
</head>
<body>
<form action="/user" method="POST">
    <span>Name</span>&nbsp;<input type="text" name="name" value=""><br>
    <span>Email</span>&nbsp;<input type="text" name="email" value=""><br>
    <span>Password</span>&nbsp;&nbsp;<input type="text" name="password" value="123456"><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>