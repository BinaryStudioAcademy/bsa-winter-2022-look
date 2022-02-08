<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset your password</title>
</head>
    <body>
    <h4>Reset password</h4>
    We got a request to reset your password.
    <a href="{{ route('password.reset-view', $token['value']) }}">Reset password link</a>
    If you ignore this message, your password will not be changed.
    </body>
</html>
