<?php

namespace App\Models;

use App\Models\User;
use App\Models\Disposition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmissionMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'as_for',
        'nik',
        'fullname',
        'email',
        'phone',
        'gender',
        'religion',
        'place_birth',
        'date_birth',
        'marriage_status',
        'nationality',
        'file_name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function disposition(){
        return $this->hasOne(Disposition::class, 'mail_id');
    }
}
