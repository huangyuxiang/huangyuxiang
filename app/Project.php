<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','thumbnail'];
    public  function getThumbnailAttribute($value){
        return $value??'test.png';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
}
