
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome !</title>
<style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .logo {
            max-width: 200px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #007BFF;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777777;
            margin-top: 30px;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            .content {
                padding: 15px;
            }
        }
</style>
</head>
<body>

<div class="content">
<h2>Dear {{ $data['name'] }},</h2>
<p>A warm welcome to {{env('MAIL_FROM_NAME')}}! We're delighted you've joined us.</p>
<p>Your account has been successfully created with the following details:</p>
<div style="background: #f0f7ff; padding: 15px; border-left: 4px solid #2a52be; margin: 20px 0;">
<p style="margin: 5px 0;"><strong>Email:</strong> {{ $data['email'] }}</p>

</div>
<p>To access your account and start exploring, click the button below:</p>
<center>
<a href="{{env('WEBSITE_URL')}}/user/login" class="button">Access My Account</a>
</center>
<p>If you have any questions or need assistance, our support team is ready to help at <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a>.</p>
<p>Thank you for choosing [Your Website Name]. We look forward to serving you!</p>
<p>Best regards,<br>
      {{env('WEBSITE_URL')}} Team</p>
</div>

</body>
</html>