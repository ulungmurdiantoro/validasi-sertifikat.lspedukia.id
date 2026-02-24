<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    public function index()
    {
        $data = DB::table('penerima_sertifs')
            ->orderBy('no_skema','ASC')
            ->get();

        return response()->json($data);
    }
}