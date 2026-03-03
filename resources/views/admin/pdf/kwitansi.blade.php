<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kwitansi BOE-Sport Space</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            background: #f8fafc;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 10px;
            padding: 25px 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            color: #1e40af;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
            color: #374151;
        }

        .subtitle {
            font-size: 14px;
            font-weight: normal;
            color: #6b7280;
        }

        .details {
            margin-bottom: 25px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details td {
            padding: 8px 6px;
        }

        .details .label {
            width: 160px;
            font-weight: bold;
            color: #374151;
        }

        .details .value {
            background: #f1f5f9;
            padding: 6px 10px;
            border-radius: 6px;
            color: #1f2937;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .footer .right {
            text-align: center;
        }

        .footer .right strong {
            display: block;
            margin-top: 60px;
            color: #1e40af;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div class="brand">BOE-Sport Space</div>
        <div class="title">
            Kwitansi<br>
            <span class="subtitle">Booking Lapangan</span>
        </div>
    </div>

    <div class="details">
        <table>
            <tr>
                <td class="label">Nama Penyewa</td>
                <td class="value">{{ $booking->penyewa->nama }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Lapangan</td>
                <td class="value">{{ $booking->lapangan->nama_lapangan }}</td>
            </tr>
            <tr>
                <td class="label">Harga Lapangan</td>
                <td class="value">Rp {{ number_format($booking->lapangan->harga,0,',','.') }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal</td>
                <td class="value">{{ \Carbon\Carbon::parse($booking->tanggal)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Sesi</td>
                <td class="value">{{ $booking->sesi_waktu }}</td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td class="value">(Bayar Di Tempat)</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div></div>
        <div class="right">
            Petugas,<br><br><br>
            <strong>Admin BOE-Sport Space</strong>
        </div>
    </div>

</div>

</body>
</html>