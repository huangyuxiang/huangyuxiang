<?php
namespace  App\Http\ViewComposer;
use App\Repositories\TasksRepository;
use Illuminate\Contracts\View\View;

class ViewComposer{
    protected $task;
    public function __construct(TasksRepository $task)
    {
        $this->task = $task;
    }

    public function compose(View $view){
        if(auth()->user()){
            $view->with([
                'total'=>$this->task->totalCount(),
                'todo'=>$this->task->todoCount(),
                'done'=>$this->task->doneCount(),
            ]);
        }
    }
}