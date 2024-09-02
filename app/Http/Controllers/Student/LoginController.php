<?php

namespace App\Http\Controllers\Student;

use App\Models\PenerimaSertif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //count students
        $penerimasertif = PenerimaSertif::get();
        dd($penerimasertif);

        return inertia('Login/Index', [
            'penerimasertif'      => $penerimasertif,
        ]);
    }
}