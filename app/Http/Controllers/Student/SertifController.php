<?php

namespace App\Http\Controllers\Student;

use App\Models\PenerimaSertif;
use Illuminate\Http\Request;
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