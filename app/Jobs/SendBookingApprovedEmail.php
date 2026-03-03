<?php
namespace App\Jobs;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class SendBookingApprovedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function handle()
    {
        $booking = $this->booking->load('penyewa','lapangan');

        $pdf = Pdf::loadView('admin.pdf.kwitansi', compact('booking'));

        Mail::send('admin.email.approved', compact('booking'), function($message) use ($booking, $pdf) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to($booking->penyewa->email)
                    ->subject('Booking Disetujui')
                    ->attachData($pdf->output(), 'kwitansi-booking.pdf');
        });
    }
}