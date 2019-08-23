<?php
/**
 * Created by PhpStorm.
 * User: huangyuxiang
 * Date: 2019/3/13
 * Time: 10:27 PM
 */
namespace App\Repositories;
use App\Projects;
use App\Task;
use Image;
class TasksRepository{
    public function list(){
        return request()->user()->projects()->get();
    }
    public function create($request){
        return Task::create([
            'name'=>$request->name,
            'completion'=>(int)$request->completion,
            'project_id'=>$request->project_id
        ]);
    }
   public function check($id){
       $task = Task::findOrFail($id);
       $task->completion = (int)true;
       return $task->save();
   }
   public function update($request,$id){
       $task = Task::findOrFail($id);
       $task->name = $request->name;
       $task->project_id = $request->project_id;
       return $task->save();
   }
    public function delete($id){
        $result = Task::findOrFail($id);
        return $result->delete($id);
    }
    public function  todos(){
        return auth()->user()->tasks()->where('completion',0)->paginate(1);
    }
    public function dones(){
        return  auth()->user()->tasks()->where('completion',1)->paginate(1);
    }
    public function todoCount(){
        return auth()->user()->tasks()->where('completion',0)->count();
    }
    public function doneCount(){
        return auth()->user()->tasks()->where('completion',0)->count();
    }
    public function totalCount(){
        return auth()->user()->tasks()->count();
    }
}