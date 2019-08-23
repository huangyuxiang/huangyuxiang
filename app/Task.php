<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\task
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected  $fillable=[
        'name','project_id','completion'
    ];
    //
    public function project(){
        return $this->belongsTo('App/project');
    }
    public function steps(){
        return $this->hasMany(Step::class);
    }
}
