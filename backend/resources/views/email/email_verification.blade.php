<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email confirm</title>
</head>
<body style="background-color: #faf9f9;">
<div class="template" style="display:flex; justify-content:center;">
    <div class="message" style="max-width:340px;">
        <div class="message-text" style="font-family: 'Lato', serif; font-size: 18px; line-height: 18px; padding: 5px; color: rgba(0, 0, 0, 0.87)">
            <h4>Hello, friend.</h4>
            Thanks for registration in Look app. Please verify your email address by clicking the button below.
            <a style="display: flex; justify-content: center; align-items: center; color: white; background-color: #fe5faa;
                      border-radius: 28px; height: 44px; width: 100%; font-size: 18px; text-decoration: none; margin: 10px 0"
               href="{{ url(config('app.front_url') . '/auth/email-confirm/' . $token) }}">Confirm email</a>
        </div>
    </div>
</div>
</body>
</html>
