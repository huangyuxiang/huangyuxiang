<?php
/**
 * Created by PhpStorm.
 * User: huangyuxiang
 * Date: 2019/3/13
 * Time: 10:27 PM
 */
namespace App\Repositories;
use App\Projects;
use Image;
class ProjectsRepository{
    public function list(){
        return request()->user()->projects()->get();
    }
    public function create($request){
        $request->user()->projects()->create([
            'name'=>$request->name,
            'thumbnail'=>$this->thumb($request)
        ]);
    }
    public function thumb($request){
        if($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumb/original',$name);
            $path  = storage_path('app/public/thumb/cropped/'.$name);
            Image::make($thumb)->resize(200,90)->save($path);
            return $name;
        }
        return null;
    }
    public static function find($id){
      return Projects::findOrFail($id);
    }
    public function delete($id){
        $result = self::find($id);
        $result->delete($id);
    }
    public function update($request,$id){
        $result = self::find($id);
        $result->name = $request->name;
        if($request->hasFile('thumbnail')){
            $result->thumbnail = $this->thumb($request);
        }
        $result->save();
    }
    public function  todos($project){
       return $project->task()->where('completion',0)->get();
    }
    public function dones($project){
        return $project->task()->where('completion',1)->get();

    }
}