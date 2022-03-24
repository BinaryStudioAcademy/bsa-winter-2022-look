<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Reset your password</title>
</head>
<body style="background-color: #faf9f9;">
    <div class="template" style="display:flex; justify-content:center;">
        <div class="message" style="max-width:340px;">
            <div class="message-text" style="display:flex; align-items:center; flex-direction: column; font-family: 'Lato', serif;
                                        font-size: 18px; line-height: 18px; padding: 5px; color: rgba(0, 0, 0, 0.87)">
                <div style="display: flex;"><h4>Reset password</h4></div>
                <img style="width: 25%; height: auto;" src="https://drive.google.com/uc?export=view&id=1BjC10FhaDyqTbVkMU9eogfggSw2wnaf1" alt="logo-img">
                <p style="text-align: center;">We have received a request for a new password for your account.</p>
                <a style="display: flex; justify-content: center; align-items: center; color: white; background-color: #fe5faa;
                      border-radius: 28px; height: 44px; width: 100%; font-size: 18px; text-decoration: none; margin: 10px 0"
                   href="{{ url(config('app.front_url') . '/auth/change-password/' . $token) }}">Reset password</a>
                <p style="text-align: center;">Ignore this message if you didnt request password changing.</p>
            </div>
        </div>
    </div>

    </body>
</html>
