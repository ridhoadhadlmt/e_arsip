<?php

namespace App\Http\Controllers;
use App\Models\Disposition;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\DispositionRequest;

class DispositionController extends Controller
{
    public function list(){
        $dispositions = Disposition::with(['workunit','incomingmail', 'outgoingmail'])->get();
        // dd($dispositions);
        return view('disposition.list', compact('dispositions'));
    }
    public function create(){
        return view('disposition.create');
    }
    public function edit(Disposition $disposition){
        $disposition = Disposition::findOrFail($disposition->id);
        return view('disposition.edit', ['disposition' => $disposition]);
    }
    public function update(Request $request, $id){
        $disposition = Disposition::findOrFail($id);
        $disposition->update([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        Alert::toast('Berhasil Ubah Data Disposisi', 'success');
        return redirect()->route('disposition');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function destroy($id){
        $disposition = Disposition::findOrFail($id);
        $disposition->delete();
        Alert::toast('Berhasil Hapus Data Disposisi', 'success');
        return redirect()->back();

    }
}
