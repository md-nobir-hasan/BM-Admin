<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Not Approved</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(60,72,88,0.15);
            padding: 2.5rem 2rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .card img {
            width: 80px;
            margin-bottom: 20px;
        }
        .card h2 {
            color: #e3342f;
            margin-bottom: 16px;
        }
        .card p {
            color: #6c757d;
            margin-bottom: 24px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #3490dc;
            color: #fff;
            padding: 0.6rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #2779bd;
        }
        .text-left{
            text-align: left;
        }
        .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #3490dc;
            text-decoration: none;
            font-weight: 500;
            margin: 4px 0;
            transition: color 0.2s;
        }
        .contact-link:hover {
            color: #2779bd;
            text-decoration: underline;
        }
        .contact-icon {
            font-size: 1.1em;
            margin-right: 4px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="card">
        <h2>Account Pending Approval</h2>
        <p>
            <strong>Thank you for registering!</strong><br>
            Your account is currently <span style="color:#e3342f;font-weight:bold;">awaiting admin approval</span>.<br>
            You will be notified by email once your account is activated.<br><br>
            <span style="color:#222;font-weight:500;">If you have any questions, please contact our support team:</span><br>
            <a href="tel:{{$site_contact_info->phone}}" class="contact-link">
                <i class="fas fa-phone contact-icon"></i>
                <span>Phone: <strong>{{$site_contact_info->phone}}</strong></span>
            </a>
            <br>
            <a href="mailto:{{$site_contact_info->email}}" class="contact-link">
                <i class="fas fa-envelope contact-icon"></i>
                <span>Email: <strong>{{$site_contact_info->email}}</strong></span>
            </a>
        </p>
        <a href="{{ url('/') }}" class="btn" style="margin-top:10px;">Refresh</a>
    </div>
</body>
</html>
