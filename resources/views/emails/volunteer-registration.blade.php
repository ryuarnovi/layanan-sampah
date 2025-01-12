// resources/views/emails/volunteer-registration.blade.php
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #15803d;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #15803d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Selamat Datang, {{ $data['name'] }}!</h1>
        </div>
        
        <div class="content">
            <p>Terima kasih telah mendaftar sebagai relawan. Kami sangat menghargai komitmen Anda untuk bergabung dengan kami.</p>

            <h3>Detail pendaftaran Anda:</h3>
            <ul>
                <li>Nama: {{ $data['name'] }}</li>
                <li>Email: {{ $data['email'] }}</li>
                <li>No. WhatsApp: {{ $data['phone'] }}</li>
                <li>Alamat: {{ $data['address'] }}</li>
            </ul>

            <p>Untuk bergabung dengan komunitas WhatsApp kami, silakan klik tautan berikut:</p>
            <a href="{{ $data['whatsapp_link'] }}" class="button">Gabung Grup WhatsApp</a>

            <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>

            <p>Salam,<br>
            {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>