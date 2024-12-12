<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkUnit;
use App\Models\IncomingMail;
use Illuminate\Http\Request;
use App\Models\SubmissionMail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubmissionMailNotification;

class SubmissionMailController extends Controller
{
    //
    public function list(){
        $submissionMails = SubmissionMail::with(['disposition'])->get();
        // dd($submissionMails);
        return view('submissionMail.list', ['submissionMails' => $submissionMails]);
    }
    public function submission(Request $request){
        $user = User::all();
        // $submission =  [
        //     'user_id' => Auth::user()->id,
        //     'category_id' => $request->category_id,
        //     'as_for' => $request->as_for,
        //     'nik' => $request->nik,
        //     'fullname' => $request->fullname,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'gender' => $request->gender,
        //     'religion' => $request->religion,
        //     'place_birth' => $request->place_birth,
        //     'date_birth' => $request->date_birth,
        //     'marriage_status' => $request->marriage_status,
        //     'nationality' => $request->nationality,
        // ];
        // SubmissionMail::create($submission);
        $fileName = time() . '-' . $request->file_name->getClientOriginalName();
        $path = $request->file_name->move(public_path('file'), $fileName);

        $submissionmail = new SubmissionMail();
        $submissionmail->user_id = Auth::user()->id;
        $submissionmail->category_id = $request->category_id;
        $submissionmail->as_for = $request->as_for;
        $submissionmail->nik = $request->nik;
        $submissionmail->fullname = $request->fullname;
        $submissionmail->email = $request->email;
        $submissionmail->phone = $request->phone;
        $submissionmail->gender = $request->gender;
        $submissionmail->religion = $request->religion;
        $submissionmail->place_birth = $request->place_birth;
        $submissionmail->date_birth = $request->date_birth;
        $submissionmail->marriage_status = $request->marriage_status;
        $submissionmail->nationality = $request->nationality;
        $submissionmail->file_name = $fileName;
        $submissionmail->save();

        $incomingMail = [
            'no_mail' => 'SRT-PNGJN-'.$submissionmail->nik,
            'date' => $submissionmail->created_at,
            'characteristic' => 'Biasa',
            'sender' => $submissionmail->fullname,
            'as_for' => $submissionmail->as_for,
            'category_id' => $submissionmail->category_id,
            'content' => 'Surat Pengajuan',
            'status' => 'Open',
            'file_name' => $fileName,
        ];
        IncomingMail::create($incomingMail);
        Alert::toast('Berhasil Mengajukan Surat', 'success');
        Notification::send($user, new SubmissionMailNotification($submissionmail));
        return redirect()->route('home');

        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function disposition(SubmissionMail $submissionMail){
        $workunits = WorkUnit::all();
        return view('submissionMail.disposition', ['submissionMail' => $submissionMail, 'workunits' => $workunits]);
    }
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
