<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function add(Request $request){
        $operator = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'workunit_id' => $request->workunit_id,
            'role' => 2,
            'password' => Hash::make($request->password),
        ];
        Operator::create($operator);
        User::create($operator);
        $user = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),

        ] ;
        return view('user.add');
    }
}
