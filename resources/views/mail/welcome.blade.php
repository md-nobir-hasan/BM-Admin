<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{$site_info->name}}</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for registering with us. We're excited to have you on board.</p>
    <p>Here are your registration details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Phone:</strong> {{ $user->phone }}</li>
        <li><strong>User ID:</strong> {{ $user->phone }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
    </ul>
    <p>If you have any questions, feel free to contact us.</p>
    <p>Best regards,<br>Your Application Team</p>
</body>
</html>
