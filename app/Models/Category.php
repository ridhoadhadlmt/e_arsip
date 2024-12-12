<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function incomingmail(){
        return $this->hasMany(IncomingMail::class);
    }
    public function outgoingmail(){
        return $this->hasMany(OutgoingMail::class);
    }

}
