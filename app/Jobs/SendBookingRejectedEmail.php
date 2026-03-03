<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Tambahkan untuk debug

class SendBookingRejectedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $details;
    protected $reason;

    public function __construct($booking, $reason)
    {
        // Ambil data ke array agar aman meskipun row di DB dihapus
        $this->details = [
            'nama_penyewa'  => $booking->penyewa->nama,
            'email_penyewa' => $booking->penyewa->email,
            'nama_lapangan' => $booking->lapangan->nama_lapangan,
            'tanggal'       => $booking->tanggal,
            'sesi_waktu'    => $booking->sesi_waktu,
        ];
        $this->reason = $reason;
    }

    public function handle()
    {
        try {
            $data = $this->details;
            $reason = $this->reason;

            Mail::send(
                'admin.email.rejected',
                ['details' => $data, 'reason' => $reason],
                function ($message) use ($data) {
                    $message->to($data['email_penyewa'])
                        ->subject('Booking Di Tolak');
                }
            );
        } catch (\Exception $e) {
            Log::error('Gagal kirim email reject: ' . $e->getMessage());
            throw $e;
        }
    }
}
