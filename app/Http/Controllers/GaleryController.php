<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GaleryController extends Controller
{
    public function index(){
        $noplats = DB::table('twoh_pic')->select('id', 'name_mcar', 'no_twoh', 'pic')->where('stat',  '=', 1)->get();
        return view('layouts.galery',[
            'noplats'=>$noplats
        ]);
    }

    public function getImage(Request $request){
        $noplat = $request->noplat;
        if($noplat == ''){
            $pict = DB::table('twoh_pic')->orderBy('id','asc')->where('stat',  '=', 1)->limit(10)->get();
        }else{
            $pict = DB::table('twoh_pic')->orderBy('id','asc')->where('name_mcar',  '=',  $noplat)->where('stat',  '=', 1)->limit(10)->get();
        }

        // $response = Response::make($pict);
        // $response->header('Content-Type', 'image/png/jfif/jpeg');
        // $response->header('Cache-Control','max-age=2592000');
        // return $response;

        return json_encode($pict);
    }

    public function updateUpload(Request $request){
        // dd($request->all());
        $noplats = DB::table('twoh_pic')->select('id', 'name_mcar', 'no_twoh', 'pic')->where('stat',  '=', 1)->get();
        for ($i = 0; $i < 8; $i++) {
            $strupload = "upload".$i;
            $hdnupload = "hdnupload".$i;
            // $imgname = $request->$strupload->getClientOriginalName();
            // dd($request->$hdnupload);            
            // dd($request->file('upload0')->hashname());
            if($request->file($strupload)!=null){
                $request->file($strupload)->store('car-images');
                DB::table('twoh_pic')->where('name_mcar','=',$request->platnum)->where('pic','=',$request->$hdnupload)->update(['pic'=>$request->file($strupload)->hashname()]);
            }
        }  
        return Redirect::route('galery')->with( [
            'noplats' => $noplats
        ] );  
    }
}
