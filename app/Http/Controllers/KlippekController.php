<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\klippek;

class KlippekController extends Controller
{
    public function Klipp(){
        return view('klipp', [
            'result'    => klippek::all()
        ]);
    }

    public function KlippData(Request $req){
        $req->validate([
            'eloado'    => 'required',
            'cim'       => 'required',
            'youtube'   => 'required|url'
        ],[
            'eloado.required'   => 'Előadót kötelező megadni',
            'cim.required'      => 'Szám címét kötelező megadni',
            'youtube.required'  => 'YouTube linket kötelező megadni',
            'youtube.url'       => 'Érvényes linket adj meg: http:// vagy https://'
        ]);

        $data           = new klippek;
        $data->eloado   = $req->eloado;
        $data->cim      = $req->cim;
        $data->youtube  = $req->youtube;
        if($req->min < 10){
            $min = '0'.$req->min;
        } else {
            $min = $req->min;
        }
        if($req->sec < 10){
            $sec = '0'.$req->sec;
        } else {
            $sec = $req->sec;
        }
        $data->hossz = '00:'.$min.':'.$sec;
        $data->Save();
        return redirect('/klippek');
    }
}
