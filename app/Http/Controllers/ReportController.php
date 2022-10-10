<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $noplats = DB::table('twoh')->select('id', 'name_mcar')->where('stat',  '=', 1)->get();
        return view('layouts.reports',[
            'noplats'=>$noplats
        ]);
    }

    public function view(Request $request){
        // dd($request->all());
        $dtfr = $request->input('dtfrom');
        $dtto = $request->input('dtto');
        $datefrForm = Carbon::createFromFormat('d/m/Y', $dtfr)->format('Y-m-d');
        $datetoForm = Carbon::createFromFormat('d/m/Y', $dtto)->format('Y-m-d');

        $noplat = $request->platnum;
        $status = $request->status;

        if($request->status == 'all'){
            $noplats = DB::table('twoh')->select('id', 'name_mcar')->where('stat',  '=', 1)->get();

            $results = DB::table('twoh_progress')->whereBetween('tdt',[$datefrForm,$datetoForm])->where('name_mcar','=',$noplat)->get();

            return view('layouts.reports',[
                'noplats'=>$noplats,
                'results'=>$results
            ]);
        }else{
            $noplats = DB::table('twoh')->select('id', 'name_mcar')->where('stat',  '=', 1)->get();

            $results = DB::table('twoh_progress')->whereBetween('tdt',[$datefrForm,$datetoForm])->where('name_mcar','=',$noplat)->where('carstat','=',$status)->get();

            return view('layouts.reports',[
                'noplats'=>$noplats,
                'results'=>$results
            ]);
        }
    }
}
