<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tanulok;

class TanulokController extends Controller
{
    public function Tanulok(){
        return view('welcome', [
            'result'    => tanulok::all(),
            'agazat'    => ['Elektronika és elektrotechnika', 'Informatika és távközlés', 'Rendészet és közszolgálat']
        ]);
    }

    public function TanulokData(Request $req){
        $req->validate([
            'nev'       => 'required',
            'lakhely'   => 'required',
            'nem'       => 'required'
        ],[
            'nev.required'          => 'Nevet kötelező megadni',
            'lakhely.required'      => 'Lakhelyet kötelező megadni',
            'nem.required'          => 'Válassza ki a nemét'
        ]);

        $data           = new tanulok;
        $data->nev      = $req->nev;
        $data->kor      = $req->kor;
        $data->lakhely  = $req->lakhely;
        $data->nem      = $req->nem;
        $data->agazat   = $req->agazat;
        $data->Save();

        return redirect('/');       # törölje a $req tartalmát
                                    # ha ugyanarra az oldalra küldöd vissza, redirect-et érdemes használni.
    }
}
