<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Approved</title>
</head>
<body style="background: #f8fafc; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background: #f8fafc; min-height: 100vh;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 500px; background: #fff; border-radius: 8px; box-shadow: 0 4px 24px rgba(60,72,88,0.10); margin: 40px 0;">
                    <tr>
                        <td style="padding: 32px 32px 16px 32px; text-align: center;">
                            {{-- <img src="{{ asset('public/assets/images/default/customer-support-icon.png') }}" alt="Account Approved" width="64" style="margin-bottom: 20px;"> --}}
                            <h1 style="color: #38c172; font-size: 1.8rem; margin-bottom: 12px; font-family: Arial, sans-serif;">
                                {{ $user->name }}, your account has been approved!
                            </h1>
                            <p style="color: #444; font-size: 1.1rem; margin-bottom: 24px; font-family: Arial, sans-serif;">
                                Congratulations and welcome to our community.<br>
                                You can now log in and start using all the features of your account.
                            </p>
                            <a href="{{ url('/login') }}" style="display: inline-block; background: #3490dc; color: #fff; text-decoration: none; padding: 12px 32px; border-radius: 5px; font-size: 1rem; font-family: Arial, sans-serif;">
                                Log In Now
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 24px 32px 32px 32px; text-align: center; color: #888; font-size: 0.95rem; font-family: Arial, sans-serif;">
                            If you have any questions or need help, feel free to reply to this email.<br>
                            Thank you for joining us!
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
