<?php

namespace App\Http\Controllers\Student;

use App\Models\PenerimaSertif;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;

class SertifController extends Controller
{
    public function index()
    {
        $penerimasertifs = PenerimaSertif::when(request()->q, function($penerimasertifs) {
            $penerimasertifs = $penerimasertifs->where('nama_lengkap', 'like', '%'. request()->q . '%');
        })->latest()->paginate(10);

        $penerimasertifs->appends(['q' => request()->q]);

        return inertia('Student/Login/Index', [
            'penerimasertifs' => $penerimasertifs,
        ]);
    }

    public function import()
    {
        return inertia('Student/Login/Import');
    }
    
    /**
     * storeImport
     *
     * @param  mixed $request
     * @return void
     */
    public function storeImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // import data
        Excel::import(new StudentsImport(), $request->file('file'));

        //redirect
        return redirect()->route('index')->with('success', 'Data berhasil diimport.');
    }

    public function show($no_sertif)
    {
        $penerimasertif = PenerimaSertif::where('no_sertif', $no_sertif)->firstOrFail();

        return inertia('Student/Login/Show', [
            'penerimasertif' => $penerimasertif,
        ]);
    }

    public function show_sk($no_sk)
    {
        $penerimask = PenerimaSertif::where('no_sk', $no_sk)->firstOrFail();

        return inertia('Student/Login/Show_Sk', [
            'penerimask' => $penerimask,
        ]);
    }

}