<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset your password</title>
</head>
<body style="background-color: #faf9f9;">
    <div class="template" style="display:flex; justify-content:center;">
        <div class="message" style="max-width:340px;">
            <div class="message-text" style="font-family: 'Lato', serif; font-size: 18px; line-height: 18px; padding: 5px; color: rgba(0, 0, 0, 0.87)">
                <h3>Reset password</h3>
                We have received a request for a new password for your account.<br>
                To create a new password, click on the link below.
            </div>
            <a style="display: flex; justify-content: center; align-items: center; color: white; background-color: #fe5faa;
                      border-radius: 28px; height: 44px; width: 100%; font-size: 18px; text-decoration: none; margin: 10px 0;"
                href="{{ url(config('app.front_url') . '/auth/change-password/' . $token) }}">Reset password link</a>
            <div class="message-text" style="font-family: 'Lato', serif; font-size: 18px; line-height: 18px; padding: 5px; color: rgba(0, 0, 0, 0.87)">
                IF YOU HAVE NOT REQUEST RESETTING PASSWORD, JUST IGNORE THIS MESSAGE.
            </div>
        </div>
    </div>
</body>
</html>
