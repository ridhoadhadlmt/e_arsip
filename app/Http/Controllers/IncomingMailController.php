<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use App\Models\IncomingMail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\DispositionRequest;
use App\Http\Requests\IncomingMailRequest;


class IncomingMailController extends Controller
{
    public function list(){
        $incomingMails = IncomingMail::with(['category', 'disposition'])->get();
        if(auth()->user()->role == 1)
            return view('incomingMail.list', ['incomingMails' => $incomingMails]);
        else
            $auth = auth()->user()->workunit_id;
            $incomingMails = IncomingMail::join('dispositions', 'dispositions.mail_id', '=', 'incoming_mails.id')
            ->where('workunit_id', '=', $auth)->get();
        // dd($incomingMails);
        return view('operator.incomingMail.list', ['incomingMails' => $incomingMails]);

    }
    public function create(){
        $categories = Category::all();
        return view('incomingMail.create', compact('categories'));
    }
    public function add(IncomingMailRequest $request){
        $fileName = time() . '-' . $request->file_name->getClientOriginalName();
        $path = $request->file_name->move(public_path('file'), $fileName);
        $data = $request->all();
        $data['status'] = 'open';
        $data['file_name'] = $fileName;
        $data['file_path'] = $path;
        $incomingMail = IncomingMail::create($data);
        Alert::toast('Berhasil Tambah Data Surat Masuk', 'success');
        return redirect()->route('incomingMail');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function edit(IncomingMail $incomingMail){
        $categories = Category::all();
        $incomingMail = IncomingMail::findOrFail($incomingMail->id);
        return view('incomingMail.edit', compact('categories','incomingMail'));
    }

    public function update(IncomingMailRequest $request, $id){
        $incomingMail = IncomingMail::findOrFail($id);
        $incomingMail->update($request->all());
        Alert::toast('Berhasil Update Data Surat Masuk', 'success');
        return redirect()->route('incomingMail');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function destroy($id){
        $incomingMail = IncomingMail::findOrFail($id);
        $incomingMail->delete();
        Alert::toast('Berhasil Hapus Data Surat Masuk', 'success');
        return redirect()->back();
    }
    public function detail(IncomingMail $incomingMail){
        $incomingMail = IncomingMail::with(['disposition','workunit'])->findOrFail($incomingMail->id);
        // dd($incomingMail);
        if(auth()->user()->role == 1)
            return view('incomingMail.detail', ['incomingMail' => $incomingMail]);
        else
            return view('operator.incomingMail.detail', ['incomingMail' => $incomingMail]);
    }
    public function disposition(IncomingMail $incomingMail){
        $workunits = WorkUnit::with(['disposition'])->get();
        if(auth()->user()->role == 1){

            return view('incomingMail.disposition', ['incomingMail' => $incomingMail, 'workunits' => $workunits]);
        }
        else
            // dd($workunits);
            return view('operator.incomingMail.disposition', ['incomingMail' => $incomingMail, 'workunits' => $workunits]);
    }
    public function addDisposition(DispositionRequest $request, $id){
        if(auth()->user()->role == 1){
            $disposition = Disposition::create([
                'mail_id' => $id,
                'workunit_id' => $request->workunit_id,
                'content' => $request->content,
                'send_via' => '',
                'category' => 'Surat Masuk',
            ]);
            return redirect()->route('incomingMail');
        }

        else
            $disposition = Disposition::findOrFail($id);
            $disposition->update([
            'workunit_id' => $request->workunit_id,
            'content' => $request->content,
            'send_via' => '',
            'category' => 'Surat Masuk',
            ]);
            return redirect()->route('operator.incomingMail');

        Alert::toast('Berhasil Disposisi Surat Masuk', 'success');
    }
    public function archive(Request $request, $id){
        $mail_id = $id;
        $incomingMail = [
            'incomingmail_id' => $mail_id,
            'outgoingmail_id' => 0,
            'archive_place' => $request->archive_place,
        ];
        $archive = Archive::create($incomingMail);
        if($archive) {
            Alert::toast('Berhasil Menyelesaikan Surat Edaran', 'success');
            $incomingMail = IncomingMail::findOrFail($id);
            $incomingMail->update([
                'status' => 'closed'
            ]);
        }
        return redirect()->back();

    }
}
