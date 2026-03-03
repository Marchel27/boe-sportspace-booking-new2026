<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Booking Ditolak</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #d32f2f;
            text-align: center;
        }

        p {
            line-height: 1.6;
            font-size: 14px;
        }

        .highlight {
            color: #1265A8;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            background-color: #1265A8;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            margin-top: 20px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Booking Ditolak ❌</h2>

        <p>Halo <span class="highlight">{{ $details['nama_penyewa'] }}</span>,</p>

        <p>Booking lapangan <span class="highlight">{{ $details['nama_lapangan'] }}</span> pada tanggal
            <span class="highlight">{{ \Carbon\Carbon::parse($details['tanggal'])->format('d F Y') }}</span>, sesi
            <span class="highlight">{{ $details['sesi_waktu'] }}</span> <strong>ditolak</strong>.
        </p>

        <p><strong>Alasan Penolakan:</strong></p>
        <p style="background:#f8f8f8; padding:10px; border-radius:6px;">
            {{ $reason }}
        </p>

        <p>Silakan hubungi admin untuk informasi lebih lanjut di nomor: <strong>0823255788</strong>.</p>

        <p>Terima kasih,<br>
            <strong>Admin BOE-Sport Space</strong>
        </p>

        <div class="footer">
            Email ini dikirim secara otomatis, mohon jangan membalas email ini.
        </div>
    </div>
</body>

</html>