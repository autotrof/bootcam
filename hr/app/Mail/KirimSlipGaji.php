<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KirimSlipGaji extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $bulan;
    private $tahun;
    private $gajiPokok;
    private $potongan;
    private $pdfPath;
    private $excelPath;
    public function __construct($bulan, $tahun, $gajiPokok, $potongan, $pdfPath, $excelPath)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->gajiPokok = $gajiPokok;
        $this->potongan = $potongan;
        $this->pdfPath = $pdfPath;
        $this->excelPath = $excelPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Slip Gaji Bulan ' . $this->bulan . ' ' . $this->tahun,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.slip-gaji',
            with: [
                'bulan' => $this->bulan,
                'tahun' => $this->tahun,
                'gajiPokok' => $this->gajiPokok,
                'potongan' => $this->potongan,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            $this->pdfPath,
            $this->excelPath
        ];
    }
}
