<?php

namespace App\Http\Controllers;

use App\Exports\ExportEmployee;
use App\Mail\KirimSlipGaji;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SlipGajiController extends Controller
{
    function pdf() {
        $bulan = 'Agustus';
        $tahun = 2023;
        $gajiPokok = 2500000;
        $potongan = 50000;
        $pdf = Pdf::loadView('pdf.slip-gaji', compact('bulan', 'tahun', 'gajiPokok', 'potongan'));
        return $pdf->stream();
    }

    function kirimEmail($bulan, $tahun) {

        // generate pdf
        $gajiPokok = 2500000;
        $potongan = 50000;

        $pdf = Pdf::loadView('pdf.slip-gaji', compact('bulan', 'tahun', 'gajiPokok', 'potongan'));
        if (!File::exists(storage_path('app/pdf'))) {
            File::makeDirectory(storage_path('app/pdf'));
        }
        $pdfPath = storage_path('app/pdf/' . $tahun . $bulan . '.pdf');
        $pdf->save($pdfPath);

        $excelPath = storage_path('app/public/excel/file.xlsx');
        // if (!File::exists(storage_path('app/excel'))) {
        //     File::makeDirectory(storage_path('app/excel'));
        // }
        Excel::store(new ExportEmployee, 'excel/file.xlsx', 'public');

        Mail::to('upload.kurniawan@gmail.com')
            ->queue(new KirimSlipGaji($bulan, $tahun, $gajiPokok, $potongan, $pdfPath, $excelPath));

        return "BERHASIL KIRIM EMAIL";
    }
}
