<?php

namespace App\Exports;

use App\Models\Employee;
use Carbon\Carbon;
use Maatwebsite\Excel\Cell;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportEmployee implements FromCollection, WithColumnFormatting, ShouldAutoSize, WithHeadings
{
    private $employees;
    public function __construct($employees) {
        $this->employees = $employees;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = $this->employees->map(function (Employee $employee) {
            $age = Carbon::parse($employee->birth_date)->age;


            $item = [
                'nik' => $employee->nik,
                'name' => $employee->name,
                'phone' => $employee->phone,
                'age' => $age,
                'entry_date' => $employee->entry_date,
                'position' => $employee->title
            ];
            return $item;
        });
        return $data;
    }

    function columnFormats() : array {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER
        ];
    }

    function headings() : array {
        return [
            'NIK', 'Nama', 'Nomor Telp', 'Usia', 'Tgl Masuk', 'Jabatan'
        ];
    }
}
