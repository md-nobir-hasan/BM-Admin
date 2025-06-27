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
    </style>
</head>
<body>
    <div class="card">
        <h2>Account Pending Approval</h2>
        <p>
            Thank you for registering!<br>
            Your account is currently <strong>awaiting admin approval</strong>.<br>
            You will be notified by email once your account is activated.<br><br>
            If you have any questions, please contact our support team.
        </p>
        {{-- <a href="{{ url('/') }}" class="btn">Back to Home</a> --}}
    </div>
</body>
</html>
