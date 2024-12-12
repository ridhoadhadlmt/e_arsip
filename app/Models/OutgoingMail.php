<?php

namespace App\Models;

use App\Models\File;
use App\Models\Archive;
use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutgoingMail extends Model
{
    use HasFactory;
    protected $fillable = [
                            'no_mail',
                            'date',
                            'characteristic',
                            'workunit_id',
                            'category_id',
                            'as_for',
                            'to',
                            'address',
                            'content',
                            'status',
                            'file_name',
                            'file_path'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function workunit(){
        return $this->belongsTo(WorkUnit::class);
    }
    public function disposition(){
        return $this->hasOne(Disposition::class, 'mail_id');
    }
    public function archive(){
        return $this->belongsTo(Archive::class, 'id', 'outgoingmail_id');
    }
    // public function file(){
    //     return $this->belongsTo(File::class, 'id', 'mail_id');
    // }
}
