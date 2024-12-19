<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autok;

class AutokController extends Controller
{
    public function Autok(){
        return view ('auto', [
            'result' => autok::all()
        ]);
    }
    public function AutokData(Request $req){
        $req -> validate([
            'rendszam' => 'required|min:6|max:9',
            'marka' => 'required',
            'tipus' => 'required',
            'evjarat' => 'required',
            'szin' => 'required',
        ],[
            'rendszam.required' => 'Rendszámot kötelező megadni',
            'marka.required' => 'Márkát kötelező megadni',
            'tipus.required' => 'Típust kötelező megadni',
            'evjarat.required' => 'Évjáratot kötelező megadni',
            'szin.required' => 'Színt kötelező megadni',
        ]);
        $data           = new autok;
        $data->rendszam   = $req->rendszam;
        $data->marka      = $req->marka;
        $data->tipus  = $req->tipus;
        $data->evjarat  = $req->evjarat;
        $data->szin  = $req->szin;

        $data->Save();
        return redirect('/auto');
    }
}
