<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
</head>
<body>
    <h1>Thank you for registering!</h1>
    <p>Dear {{ $registration['first_name'] ?? $registration['wards_name'] }},</p>
    <p>Your registration for the {{ $registration['course_name'] }} course has been successfully received.</p>
    <p>We will contact you shortly with more details.</p>
    <p>Best regards,</p>
    <p>The GPA Team</p>
</body>
</html>
