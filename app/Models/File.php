<?php

namespace App\Models;

use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['mail_id', 'file_name', 'file_path'];

    public function incomingmail(){
        return $this->belongsTo(IncomingMail::class);
    }
    public function outgoingmail(){
        return $this->belongsTo(OutgoingMail::class);
    }
}
