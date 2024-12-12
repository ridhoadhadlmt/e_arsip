<?php

namespace App\Models;

use App\Models\User;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function outgoingmail(){
        return $this->hasMany(OutgoingMail::class);
    }
    public function incomingmail(){
        return $this->belongsTo(IncomingMail::class);
    }
    public function disposition(){
        return $this->hasOne(Disposition::class,'workunit_id');
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
