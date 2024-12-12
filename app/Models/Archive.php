<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = ['incomingmail_id','outgoingmail_id','archive_place'];

    public function outgoingmail(){
        return $this->belongsTo(OutgoingMail::class);
    }
}
