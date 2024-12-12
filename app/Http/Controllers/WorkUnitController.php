<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkUnit;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\WorkUnitRequest;


class WorkUnitController extends Controller
{
    public function list(){
        $workunits = WorkUnit::all();
        return view('workUnit.list', compact('workunits'));
    }
    public function create(){
        return view('workUnit.create');
    }
    public function add(WorkUnitRequest $request){

        $workunit = WorkUnit::create([
            'name' => $request->name,
        ]);
        Alert::toast('Berhasil Tambah Data Unit Kerja', 'success');
        return redirect()->route('workUnit');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

    }
    public function edit(WorkUnit $workUnit){
        $workUnit = WorkUnit::findOrFail($workUnit->id);
        return view('workUnit.edit', compact('workUnit'));
    }
    public function update(WorkUnitRequest $request, $id){

        $workunit = WorkUnit::findOrFail($id);
        $workunit->update([
            'name' => $request->name,
        ]);
        Alert::toast('Berhasil Ubah Data Unit Kerja', 'success');
        return redirect()->route('workUnit');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function destroy($id){
        $workunit = WorkUnit::findOrFail($id);
        $workunit->delete();
        Alert::toast('Berhasil Hapus Data Unit Kerja', 'success');
        return redirect()->back();

    }

}
