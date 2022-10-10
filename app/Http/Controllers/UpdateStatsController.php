<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateStatsController extends Controller
{
    public function index(){
        $noplats = DB::table('twoh')->select('id', 'no', 'name_mcar')->where('stat',  '=', 1)->get();

        $pics = DB::table('memp')->select('id', 'name')->where('stat',  '=', 1)->get();
        return view('layouts.updatestats',[
            'noplats'=>$noplats,
            'pics'=>$pics
        ]);
    }

    public function getNoPlatDetails() {
        $noplats = DB::table('twoh')->where('stat',  '=', 1)->get();
        return json_encode($noplats);
    }
    
    public function getNoTwoh(Request $request) {
        $noplat = $request->noplat;
        if($noplat == ''){
            $notwoh = DB::table('twoh')->orderBy('id','asc')->where('stat',  '=', 1)->limit(10)->get();
        }else{
            // $notwoh = DB::table('twoh')->orderBy('id','asc')->where('name_mcar',  'like',  '%'.$noplat.'%')->limit(10)->get();
            $notwoh = DB::table('twoh')->orderBy('id','asc')->where('name_mcar',  '=', $noplat)->where('stat',  '=', 1)->limit(10)->get();
        }
        return json_encode($notwoh);
    }

    public function getTwohDetails(Request $request) {
        $noplat = $request->noplat;
        $notwoh = $request->notwoh;
        if($notwoh == ''){
            $twoh = DB::table('twoh')->orderBy('id','asc')->where('stat',  '=', 1)->limit(10)->get();
        }else{
            $twoh = DB::table('twoh')->orderBy('id','asc')->where('name_mcar',  '=',  $noplat)->where('no',  '=', $notwoh)->where('stat',  '=', 1)->limit(10)->get();
        }
        return json_encode($twoh);
    }

    public function getPic(Request $request){
        // $pic = DB::table('twoh')->get();
        $picname = $request->picname;
        if($picname == ''){
            $pics = DB::table('memp')->orderBy('name','asc')->where('stat',  '=', 1)->limit(10)->get();
        }else{
            $pics = DB::table('memp')->orderBy('name','asc')->where('name',  'like',  '%'.$picname.'%')->where('stat',  '=', 1)->limit(10)->get();
        }
        $response = array();
        foreach($pics as $pic){
            $response[] = array(
                "id"=>$pic->id,
                "nama"=>$pic->name,
            );
        }
        return response()->json($response);
    }

    public function saveUpdateStats(Request $request){
        // dd($request->all());
        $dtfinish = Carbon::createFromFormat('d/m/Y', $request->dtfinish)->format('Y-m-d');
        DB::table('twoh_progress')->insert(['no_twoh'=> $request->notwoh,'name_mcar'=>$request->hdnplat,'carstat'=>$request->status, 'name_memp'=>$request->pic, 'tdt'=> $dtfinish, 'note'=>$request->notes ,'usin'=> 1]);

        $noplats = DB::table('twoh')->select('id', 'no', 'name_mcar')->where('stat',  '=', 1)->get();

        $pics = DB::table('memp')->select('id', 'name')->where('stat',  '=', 1)->get();
        return view('layouts.updatestats',[
            'noplats'=>$noplats,
            'pics'=>$pics
        ]);
    }
}
