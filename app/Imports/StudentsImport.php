<?php

namespace App\Imports;

use App\Models\PenerimaSertif;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PenerimaSertif([
            'nama_lengkap' => $row['nama_lengkap'] ?? null,
            'skema'        => $row['skema'] ?? null,
            'batch'        => $row['batch'] ?? null,
            'no_skema'     => $row['no_skema'] ?? null,
            'no_sertif'    => $row['no_sertif'] ?? null,
            'no_sk'        => $row['no_sk'] ?? null,
            'nama_gelar'   => $row['nama_gelar'] ?? null,

            // kolom excel: tgl_rilis_id & tgl_berakhir_id
            'tgl_rilis'    => $this->parseTanggal($row['tgl_rilis_id'] ?? null),
            'tgl_berakhir' => $this->parseTanggal($row['tgl_berakhir_id'] ?? null),
        ]);
    }

    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // contoh:
            // 'no_sertif' => 'required|unique:penerima_sertifs,no_sertif',
        ];
    }

    /**
     * Parse tanggal dari Excel:
     * - Support "3 Maret 2026"
     * - Support serial number excel (angka)
     * - Support format umum (2026-03-03, 03/03/2026, dll)
     *
     * @param mixed $value
     * @return string|null (format: Y-m-d)
     */
    private function parseTanggal($value): ?string
    {
        if ($value === null) {
            return null;
        }

        // rapikan string
        if (is_string($value)) {
            $value = trim($value);
            if ($value === '') return null;
        }

        // 1) Jika numeric (serial date excel)
        // Excel kadang kirim 45351 (atau float)
        if (is_numeric($value)) {
            try {
                $dt = ExcelDate::excelToDateTimeObject($value);
                return Carbon::instance($dt)->format('Y-m-d');
            } catch (\Throwable $e) {
                // lanjut ke parsing lain
            }
        }

        // 2) Jika format Indonesia "3 Maret 2026"
        if (is_string($value) && preg_match('/\b(Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember)\b/u', $value)) {
            $value = $this->indoMonthToEnglish($value);
            try {
                return Carbon::parse($value)->format('Y-m-d');
            } catch (\Throwable $e) {
                return null;
            }
        }

        // 3) Coba parse format umum
        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Ubah nama bulan Indonesia jadi English agar Carbon gampang parse.
     */
    private function indoMonthToEnglish(string $tanggal): string
    {
        $map = [
            'Januari'   => 'January',
            'Februari'  => 'February',
            'Maret'     => 'March',
            'April'     => 'April',
            'Mei'       => 'May',
            'Juni'      => 'June',
            'Juli'      => 'July',
            'Agustus'   => 'August',
            'September' => 'September',
            'Oktober'   => 'October',
            'November'  => 'November',
            'Desember'  => 'December',
        ];

        return strtr($tanggal, $map);
    }
}