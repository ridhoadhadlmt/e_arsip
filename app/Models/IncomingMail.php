<?php

namespace App\Models;

use App\Models\File;
use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomingMail extends Model
{
    use HasFactory;
    protected $fillable = ['no_mail', 'date', 'characteristic','sender', 'as_for', 'category_id','content','status', 'file_name', 'file_path'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function disposition(){
        return $this->hasOne(Disposition::class, 'mail_id');
    }
    public function file(){
        return $this->belongsTo(File::class, 'id', 'mail_id');
    }
    public function workunit(){
        return $this->belongsTo(WorkUnit::class,'id');
    }
}
