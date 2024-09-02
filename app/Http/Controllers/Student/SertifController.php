<?php

namespace App\Http\Controllers\Student;

use App\Models\PenerimaSertif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SertifController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get penerimasertifs
        $penerimasertifs = PenerimaSertif::when(request()->q, function($penerimasertifs) {
            $penerimasertifs = $penerimasertifs->where('nama_lengkap', 'like', '%'. request()->q . '%');
        })->latest()->paginate(10);

        //append query string to pagination links
        $penerimasertifs->appends(['q' => request()->q]);

        //render with inertia
        return inertia('Student/Login/Index', [
            'penerimasertifs' => $penerimasertifs,
        ]);
    }
}