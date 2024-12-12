<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\incomingMail;
use App\Models\outgoingMail;
use App\Models\WorkUnit;
use App\Models\Disposition;

class DashboardController extends Controller
{
    public function count(){
        $incomingMail = IncomingMail::count();
        $outgoingMail = OutgoingMail::count();
        $workUnit = WorkUnit::count();
        return view('template.admin', compact('incomingMail','outgoingMail','workUnit'));
    }
}
