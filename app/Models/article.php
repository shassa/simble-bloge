<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable =['title','body','user_id','category_id','image'];

    public function comment(){
        return $this->hasMany('App\Models\comment','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\category','category_id');
    }

}
