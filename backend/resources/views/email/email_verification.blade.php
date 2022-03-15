<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email confirm</title>
</head>
<body>
<h4>Email confirm</h4>
Hello.
Thanks for registration in Look app. Please verify your email address by clicking the button below.<br>
<a href="{{ url(config('app.front_url') . '/auth/email-confirm/' . $token) }}">Confirm email</a>
</body>
</html>
