<?php

namespace App\Http\Controllers;

use App\Models\WorkUnit;
use PDF;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function incomingMail(){
        $workunits = WorkUnit::all();
        return view('report.incomingMail.list', compact('workunits'));
    }

    public function outgoingMail(){
        $workunits = WorkUnit::all();
        return view('report.outgoingmail.list', compact('workunits'));
    }
    public function incomingMailSearch(Request $request){
        $workunits = WorkUnit::all();
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $workunit_id = $request->workunit_id;
        if($workunit_id === null ){
            $incomingMails = IncomingMail::with('disposition')->whereBetween('date',[$date_start,$date_end])->get();
        }
        else{
            $incomingMails = IncomingMail::withWhereHas('disposition', function($query)use($workunit_id){
                $query->where('workunit_id',$workunit_id);
            })->whereBetween('date',[$date_start,$date_end])->get();
        }
        if($request->has('search')){
            return view('report.incomingMail.search', compact('incomingMails', 'workunits', 'workunit_id', 'date_start', 'date_end'));

        }



    }
    public function incomingMailExport(Request $request){
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $workunit_id = $request->workunit_id;
        if($workunit_id === null ){
            $incomingMails = IncomingMail::with('disposition')->whereBetween('date',[$date_start,$date_end])->get();
        }
        else{
            $incomingMails = IncomingMail::withWhereHas('disposition', function($query)use($workunit_id){
                $query->where('workunit_id',$workunit_id);
            })->whereBetween('date',[$date_start,$date_end])->get();
        }
        $pdf = PDF::loadView('report.incomingMail.pdf', compact('date_start', 'date_end', 'incomingMails'))->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Surat Masuk.pdf');
    }
    public function outgoingMailSearch(Request $request){
        $workunits = WorkUnit::all();
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $workunit_id = $request->workunit_id;
        if($workunit_id === null ){
            $outgoingMails = OutgoingMail::with('workunit')->whereBetween('date',[$date_start,$date_end])->get();
        }
        else{
            $outgoingMails = OutgoingMail::withWhereHas('workunit', function($query)use($workunit_id){
                $query->where('id',$workunit_id);
            })->whereBetween('date',[$date_start,$date_end])->get();
        }
        if($request->has('search')){
            return view('report.outgoingMail.search', compact('outgoingMails', 'workunits','workunit_id', 'date_start', 'date_end'));

        }

    }
    public function outgoingMailExport(Request $request){
        $workunits = WorkUnit::all();
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $workunit_id = $request->workunit_id;
        if($workunit_id === null ){
            $outgoingMails = OutgoingMail::with('workunit','archive')->whereBetween('date',[$date_start,$date_end])->get();
        }
        else{
            $outgoingMails = OutgoingMail::withWhereHas('workunit', function($query)use($workunit_id){
                $query->where('id',$workunit_id);
            })->whereBetween('date',[$date_start,$date_end])->get();
        }
        $pdf = PDF::loadView('report.outgoingMail.pdf', compact('outgoingMails', 'date_start', 'date_end','workunits'))->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Surat Keluar.pdf');

    }

}
