<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\PenerimaSertif;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PenerimaSertif([
            'nama_lengkap'      => $row['nama_lengkap'],
            'skema'             => $row['skema'],
            'batch'             => $row['batch'],
            'no_skema'          => $row['no_skema'],
            'no_sertif'         => $row['no_sertif'],
            'no_sk'             => $row['no_sk'],
            'nama_gelar'        => $row['nama_gelar'],
            'tgl_rilis'         => $row['tgl_rilis'],
            'tgl_berakhir'      => $row['tgl_berakhir'],
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
            // 'no_participant' => 'unique:students,no_participant',
        ];
    }
}