<!-- resources/views/emails/account_locked.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Locked Notification</title>
</head>
<body>
    <p>Hello {{ $shop->name }},</p>

    <p>Your account has been locked. If you believe this is an error, please contact support.</p>

    <p>Thank you,</p>
    <p>Your Application Team</p>
</body>
</html>
