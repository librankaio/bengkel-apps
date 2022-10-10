<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UploadPhotoController extends Controller
{
    public function index(){
        // $noplats = DB::table('twoh')->select('id', 'name_mcar')->where('stat',  '=', 1)->get();
        $noplats = DB::table("twoh")
        ->whereNotIn('no_tsttk', DB::table('tpass')->select("no_tsttkh")->where('stat','=','1'))
        ->select("twoh.name_mcar")
        ->where('twoh.stat','=','1')
        ->get();
        
        // $noplats = DB::table('twoh')->select('id', 'name_mcar')->distinct()->where('stat',  '=', 1)->whereNotIn('book_price', [100,200])->limit(10)->get();
        // dd($noplats);
        return view('layouts.uploaddata',[
            'noplats'=>$noplats
        ]);
    }

    public function getNoPlat(Request $request) {
        $platnum = $request->platnum;
        if($platnum == ''){
            $noplats = DB::table('twoh')->orderBy('name_mcar','asc')->where('stat',  '=', 1)->limit(10)->get();
        }else{
            // $noplats = DB::table('twoh')->orderBy('name_mcar','asc')->where('name_mcar',  'like',  '%'.$platnum.'%')->limit(10)->get();
            $noplats = DB::table('twoh')->orderBy('name_mcar','asc')->where('name_mcar',  '=', $platnum)->where('stat',  '=', 1)->limit(10)->get();
        }
        $response = array();
        foreach($noplats as $noplat){
            $response[] = array(
                "id"=>$noplat->id,
                "nama"=>$noplat->name_mcar,
            );
        }
        return response()->json($response);
    }

    public function saveUploadPhoto(Request $request){
        // dd($request->all());        
        $noplats = DB::table("twoh")
        ->whereNotIn('no_tsttk', DB::table('tpass')->select("no_tsttkh")->where('stat','=','1'))
        ->select("twoh.name_mcar")
        ->where('twoh.stat','=','1')
        ->get();
        for ($i = 0; $i < 8; $i++) {
            $strupload = "upload".$i;
            $strdsc = "desc".$i;
            // $imgname = $request->$strupload->getClientOriginalName();
            // dd($imgname);            
            // dd($request->file('upload0')->hashname());
            if($request->$strupload != null){
                $request->file($strupload)->store('car-images');
                DB::table('twoh_pic')->insert(['no_twoh'=> $request->notwoh,'name_mcar'=>$request->platnum,'pic'=>$request->file($strupload)->hashname(),'note'=>$request->$strdsc, 'usin'=> 1, 'stat'=> 1]);
            }
        }  
        return Redirect::route('upload')->with( [
            'noplats' => $noplats
        ] );      
        // return view('layouts.uploaddata',[
        //     'noplats'=>$noplats
        // ]);
    }

    public function countPict(Request $request){
        $noplat = $request->noplat;
        if($noplat != ''){
            $countpic = DB::table('twoh_pic')->where('name_mcar','=',$noplat)->where('stat',  '=', 1)->count();
        }      

        return response($countpic);
    }
}
