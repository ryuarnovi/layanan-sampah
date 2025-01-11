<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .details {
            background: #f7f7f7;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .header {
            color: #2c3e50;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Konfirmasi Donasi</h1>
        
        <p>Halo {{ $donationDetails['name'] }},</p>
        
        <p>Terima kasih atas donasi Anda. Berikut adalah detail donasi Anda:</p>
        
        <div class="details">
            <p><strong>ID Transaksi:</strong> {{ $donationDetails['transaction_id'] }}</p>
            <p><strong>Jumlah Donasi:</strong> Rp {{ number_format($donationDetails['amount'], 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $donationDetails['payment_method'] }}</p>
            <p><strong>Tanggal:</strong> {{ date('d/m/Y H:i:s') }}</p>
        </div>

        <p>Donasi Anda sangat berarti bagi kami. Terima kasih atas dukungan Anda.</p>
        
        <br>
        <p>Salam hormat,<br>
        Tim Donasi</p>
    </div>
</body>
</html>