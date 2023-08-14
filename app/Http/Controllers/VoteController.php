<?php

namespace App\Http\Controllers;

use App\Exports\VoteExport;
use App\Imports\VoteImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VoteController extends Controller
{
    public function store(Request $request){
        foreach( $request->file('file') as $i){
            Excel::import(new VoteImport($request->kota, $request->kecamatan), $i);
        }
        return redirect('/');
    }

    public function download(Request $request){
        return (new VoteExport)->download(time().'votex.xlsx');
    }
}
