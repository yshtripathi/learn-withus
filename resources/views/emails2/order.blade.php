<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Confirmation </title>
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
            border-bottom: 1px solid #eeeeee;
        }
        .logo {
            max-width: 180px;
        }
        .content {
            padding: 25px 0;
        }
        .order-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4e73df;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4e73df;
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
            border-top: 1px solid #eeeeee;
            padding-top: 20px;
        }
        .info-box {
            background-color: #f1f8ff;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
        }
</style>
</head>
<body>
<div class="header">
<!--<img src="https://digitalcontenthub.com/logo.png" class="logo">-->
    
   
<h2 style="color: #4e73df; margin-bottom: 5px;">Your Order is Confirmed</h2>
<p style="color: #6c757d; margin-top: 0;">Order: {{ $order['order_number'] }}</p>
</div>
<div class="content">
<p>Dear {{ $order['first_name'] }},</p>
<p>
Thank you for booking with {{env('MAIL_FROM_NAME')}}! We’re excited to provide you with an exceptional experience.
    </p>
<div class="order-info">
<h3 style="margin-top: 0;">Booking Details</h3>
<p><strong>Booking ID:</strong> #{{ $order['order_number'] }}</p>


<p><strong>Total Amount:</strong>  {{ $order['currency'] }}  
    {{number_format($order['total_amount'], $order['currency']=='JPY' ? 0 : 2)}} 
    </p>
</div>


<p>If you need any assistance, please reach out to our support team at <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a> and mention your Booking ID: {{ $order['order_number'] }}.</p>
    
<p>We look forward to welcoming you!</p>

<p>Best regards,<br>
    <p>{{env('MAIL_FROM_NAME')}} Team</p>
    <p>{{env('WEBSITE_URL')}}</p>
</div>

</body>
</html>