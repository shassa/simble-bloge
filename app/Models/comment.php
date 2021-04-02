<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $fillable =['name','user_id','article_id','text'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function article(){
        return $this->belongsTo('App\Models\article','article_id');
    }

}
