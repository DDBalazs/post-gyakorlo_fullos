<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\szallitas;

class SzallitasController extends Controller
{
    public function Szallitas(){
        return view('szallitas',[
            'result'    => szallitas::all(),
            'korzet'    => [20,30,50,70]
        ]);
    }

    public function SzallitasData(){

    }
}
