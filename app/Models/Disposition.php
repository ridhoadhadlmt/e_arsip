<?php

namespace App\Models;

use App\Models\WorkUnit;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disposition extends Model
{
    use HasFactory;
    protected $fillable = ['mail_id','workunit_id','content','send_via','category'];

    public function workunit(){
        return $this->belongsTo(WorkUnit::class,'id');
    }
    public function incomingmail(){
        return $this->belongsTo(IncomingMail::class, 'id');
    }
    public function outgoingmail(){
        return $this->belongsTo(OutgoingMail::class, 'id');
    }
    public function submissionmail(){
        return $this->belongsTo(SubmissionMail::class, 'id', 'mail_id');
    }
}
