<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Http\Request;
use App\Models\SubmissionMail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

        $categories = Category::all();
        $user_id = Auth::user()->id;
        $submissionMails = SubmissionMail::where('user_id', '=', $user_id)->count();
        // dd($submissionMails);
        return view('template.user',compact('categories', 'submissionMails'));
    }
    public function admin()
    {

        // $user = User::find(auth()->user()->role == 1);
        // return view('template.admin', compact('user'));
        // dd($user);
        $incomingMails = IncomingMail::count();
        $outgoingMails = OutgoingMail::count();
        $dispositions = Disposition::count();
        $workUnits = WorkUnit::count();
        return view('template.admin', compact('incomingMails', 'outgoingMails', 'dispositions', 'workUnits'));
    }
    public function operator()
    {
        $auth = auth()->user()->workunit_id;
        $incomingMails = IncomingMail::join('dispositions', 'dispositions.mail_id', '=', 'incoming_mails.id')
        ->where('workunit_id', '=', $auth)->count();
        $outgoingMails = OutgoingMail::join('work_units', 'work_units.id', '=', 'outgoing_mails.workunit_id')
        ->where('workunit_id', '=', $auth)->count();
        $all = $incomingMails + $outgoingMails;
        return view('template.operator', compact('incomingMails', 'outgoingMails', 'all'));
    }
    public function setting(){
        $auth = Auth::user();
        // dd($auth);
        return view('user.setting', compact('auth'));
    }
}
