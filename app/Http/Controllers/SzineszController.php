<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\szinesz;

class SzineszController extends Controller
{
    public function Szinesz(){
        return view('szinesz', [
            'result' => szinesz::all()
        ]);
    }

    public function SzineszData(Request $req){
        $req -> validate([
            'nev'                   => 'required',
            'szuletes'              => 'required|after:1900-01-01|before:'.date('Y-m-d'),
            'nemzet'                => 'required',
        ],[
            'nev.required'          => "Adja meg a színész nevét!",
            'szuletes.required'     => "Adja meg a színész születési idejét!",
            'nemzet.required'       => "Adja meg a színész nemzetiségét!",
            'szuletes.after'        => "A dátum csak 1900-01-01 felett lehet",
            'szuletes.before'       => "A dátum csak a mai dátumig lehet"
        ]);
        $data = new szineszek;
        $data->nev = $req->nev;
        $data->szuletes = $req->szuletes;
        $data->nemzet = $req->nemzet;
        $data->oscar_dij = $req->oscar_dij == "i" ? "i" : "n";

        $data->Save();
        return redirect('/szinesz');
    }
}
