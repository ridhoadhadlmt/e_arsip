<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    //

    public function upload(Request $request,$id){
        $rules = array(
            'file_name' => 'mimes:jpeg,png,jpg,pdf|max:1000',
        );
        $fileName = time() . '-' . $request->file_name->getClientOriginalName();
        $path = $request->file_name->move(public_path('file'), $fileName);
        $file['mail_id'] = $id;
        $file['file_name'] = $fileName;
        $file['file_path'] = $path;
        File::create($file);
        Alert::toast('Berhasil Upload File Surat', 'success');

        if(auth()->user()->role == 1)
            return redirect()->back()->with('error', 'No file added');
        else
            return redirect()->back('outgoingMail.detail')->with('error', 'No file added');
    }
    public function view($pathToFile){
        // dd($pathToFile);
        return response()->file($pathToFile);
    }
}
