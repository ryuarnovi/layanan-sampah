<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
    <h2>Halo {{ $user->name }},</h2>
    <p>Terima kasih telah mendaftar. Silakan klik link di bawah ini untuk memverifikasi email Anda:</p>
    <a href="{{ route('verify.email', $user->email_verification_token) }}">
        Verifikasi Email
    </a>
</body>
</html>