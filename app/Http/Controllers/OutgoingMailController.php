<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Archive;
use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use App\Models\OutgoingMail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\DispositionRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OutgoingMailNotification;

class OutgoingMailController extends Controller
{

    public function list(){
        if(auth()->user()->role == 1){
            $outgoingMails = OutgoingMail::with(['workunit','category'])->get();
                return view('outgoingmail.list', compact('outgoingMails'));
        }
        else
            $outgoingMails = OutgoingMail::with(['disposition'])->get();
            // dd($outgoingMails);
            return view('operator.outgoingmail.list', compact('outgoingMails'));
    }
    public function create(){
        $workUnits = WorkUnit::all();
        $categories = Category::all();
        return view('outgoingmail.create', compact('workUnits','categories'));
    }

    public function add(DispositionRequest $request){
        // $user = User::all();
        $fileName = time() . '-' . $request->file_name->getClientOriginalName();
        $path = $request->file_name->move(public_path('file'), $fileName);
        $data = $request->all();
        $data['status'] = 'open';
        $data['file_name'] = $fileName;
        $data['file_path'] = $path;
        $data['send_via'] = '';
        $data['description'] = '';
        $outgoingMail = OutgoingMail::create($data);
        Alert::toast('Berhasil Tambah Data Surat Keluar', 'success');
        // Notification::send($user, new OutgoingMailNotification($data));
        return redirect()->route('outgoingMail');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function edit(OutgoingMail $outgoingMail){
        $categories = Category::all();
        $workUnits = WorkUnit::all();
        $outgoingMail = OutgoingMail::findOrFail($outgoingMail->id);
        return view('outgoingMail.edit', compact('categories','workUnits','outgoingMail'));
    }
    public function update(outgoingMailRequest $request, $id){
        $outgoingMail = OutgoingMail::findOrFail($id);
        $outgoingMail->update($request->all());
        Alert::toast('Berhasil Update Data Surat Keluar', 'success');
        return redirect()->route('outgoingMail');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function destroy($id){
        $outgoingMail = OutgoingMail::findOrFail($id);
        $outgoingMail->delete();
        Alert::toast('Berhasil Hapus Data Surat Keluar', 'success');
        return redirect()->back();
    }
    public function detail(OutgoingMail $outgoingMail){
        $outgoingMail = OutgoingMail::findOrFail($outgoingMail->id);
        // dd($outgoingMail);
        if(auth()->user()->role == 1)
            return view('outgoingMail.detail', ['outgoingMail' => $outgoingMail]);
        else
            return view('operator.outgoingMail.detail', ['outgoingMail' => $outgoingMail]);
    }
    public function disposition(OutgoingMail $outgoingMail){
        $workunits = WorkUnit::all();
        return view('operator.outgoingMail.disposition', ['outgoingMail' => $outgoingMail, 'workunits' => $workunits]);
    }
    public function addDisposition(DispositionRequest $request,$id){
        $disposition = Disposition::create([
            'mail_id' => $id,
            'workunit_id' => auth()->user()->workunit_id,
            'content' => $request->content,
            'send_via' => $request->send_via,
            'category' => 'Surat Keluar',
        ]);

        Alert::toast('Berhasil Disposisi Surat Keluar', 'success');
        return redirect()->route('operator.outgoingMail');
    }
    public function archive(Request $request, $id){
        $mail_id = $id;
        $outgoingMail = [
            'incomingmail_id' => 0,
            'outgoingmail_id' => $mail_id,
            'archive_place' => $request->archive_place,
        ];
        $archive = Archive::create($outgoingMail);
        if($archive) {
            Alert::toast('Berhasil Menyelesaikan Surat Edaran', 'success');
            $outgoingMail = OutgoingMail::findOrFail($id);
            $outgoingMail->update([
                'status' => 'closed'
            ]);
        }
        return redirect()->back();

    }

}
