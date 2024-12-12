<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function list(){
        return view('institution');

    }
}
