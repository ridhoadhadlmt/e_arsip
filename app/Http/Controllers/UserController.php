<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function list(){
        $users = User::with(['workunit'])->get();
        return view('user.list', ['users' => $users]);
    }
    public function create(){
        $workunits = WorkUnit::all();
        return view('user.create',['workunits' => $workunits]);
    }
    public function add(Request $request){
        $user =  [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'workunit_id' => $request->workunit_id,
            'role' => 2,
            'password' => Hash::make($request->password),
        ];
        User::create($user);
        // dd($user);
        Alert::toast('Berhasil Tambah Data User', 'success');
        return redirect()->route('user');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function edit(User $user){
        $workunits = WorkUnit::all();
        $user = User::findOrFail($user->id);
        return view('user.edit', ['user' => $user, 'workunits' => $workunits]);
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'workunit_id' => $request->workunit_id,
            'role' => 2,
            'password' => Hash::make($request->password),
        ]);
        Alert::toast('Berhasil Update Data User', 'success');
        return redirect()->route('user');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        Alert::toast('Berhasil Hapus Data Pengguna', 'success');
        return redirect()->back();

    }
}
