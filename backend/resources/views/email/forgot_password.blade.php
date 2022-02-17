<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #faf9f9;
        }

        .template {
            display: flex;
            justify-content: center;
        }

        .message {
            max-width: 340px;
        }

        .reset-link {
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            background-color: #fe5faa;
            border-radius: 28px;
            height: 44px;
            width: 100%;
            letter-spacing: 0.0892857143em;
            text-indent: 0.0892857143em;
            font-size: 18px;
            text-decoration: none;
        }

        .message-text {
            font-family: 'Lato', serif;
            font-size: 18px;
            line-height: 18px;
            padding: 5px 0 0 0;
            color: rgba(0, 0, 0, 0.87);
        }

        a {
            margin: 10px 0;
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>Reset your password</title>
</head>
    <body>
    <div class="template">
        <div class="message">
            <div class="message-text">
                <h3>Reset password</h3>
                We have received a request for a new password for your account.<br>
                To create a new password, click on the link below.
            </div>
            <a class="reset-link" href="{{ url(config('app.front_url') . '/auth/change-password/' . $token ) }}">
                <div class="reset-link">
                Reset password link
                </div>
            </a>
            <div class="message-text">
                IF YOU HAVE NOT REQUEST RESETTING PASSWORD, JUST IGNORE THIS MESSAGE.
            </div>
        </div>
    </div>
    </body>
</html>
