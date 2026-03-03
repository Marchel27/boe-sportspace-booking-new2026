<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f1f5f9; padding: 20px;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                
                <table width="500" cellpadding="0" cellspacing="0" 
                       style="background: #ffffff; padding: 30px; border-radius: 8px;">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <h2 style="margin: 0; color: #1e40af;">
                                BOE-Sport Space
                            </h2>
                            <p style="margin: 5px 0 0; font-size: 14px; color: #64748b;">
                                Konfirmasi Booking
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="font-size: 14px; color: #334155;">
                            
                            <p>Halo <strong>{{ $booking->penyewa->nama }}</strong>,</p>

                            <p>
                                Booking Anda telah <strong style="color: #16a34a;">
                                disetujui</strong>. Berikut detail pemesanan Anda:
                            </p>

                            <table width="100%" cellpadding="8" 
                                   style="background: #f8fafc; margin: 15px 0; border-radius: 6px;">
                                <tr>
                                    <td width="40%"><strong>Lapangan</strong></td>
                                    <td>: {{ $booking->lapangan->nama_lapangan }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal</strong></td>
                                    <td>: {{ \Carbon\Carbon::parse($booking->tanggal)->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Sesi</strong></td>
                                    <td>: {{ $booking->sesi_waktu }}</td>
                                </tr>
                            </table>

                            <p>
                                Silakan melakukan pembayaran sesuai ketentuan.
                                Kwitansi booking terlampir dalam email ini.
                            </p>

                            <p>
                                Terima kasih telah mempercayakan kebutuhan olahraga Anda kepada kami 🙌
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding-top: 20px; font-size: 12px; color: #94a3b8;" align="center">
                            © {{ date('Y') }} BOE-Sport Space<br>
                            Email ini dikirim otomatis, mohon tidak membalas email ini.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>