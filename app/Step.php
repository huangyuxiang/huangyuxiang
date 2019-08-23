<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Step
 *
 * @property int $id
 * @property string $name
 * @property int $task_id
 * @property int $completion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Task $tasks
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereCompletion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Step extends Model
{
    protected  $fillable=[
        'name','task_id'
    ];
    //
    public function  tasks(){
        
        return $this->belongsTo(Task::class);
        
    }
}
