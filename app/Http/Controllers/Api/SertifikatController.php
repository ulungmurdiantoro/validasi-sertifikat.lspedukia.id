<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    public function index()
    {
        $data = DB::table('penerima_sertifs_v4')
            ->orderBy('no_skema','ASC')
            ->get();

        return response()->json($data);
    }
}