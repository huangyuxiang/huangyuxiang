<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use JsonSchema\Uri\Retrievers\Curl;

class Projects extends Controller
{
    protected $repo;
    public  function __construct(ProjectsRepository $repo)
    {
        $this->middleware('auth');
        $this->repo = $repo;
    }

    public function index(){
        $projects = $this->repo->list();
        return view('welcome',compact('projects'));
    }
    public function store(CreateRequest $request){

        $this->repo->create($request);
        return back();
    }

    public function destroy($id){
        $this->repo->delete($id);
        return back();
    }
    public function update(UpdateRequest $request,$id){
        $this->repo->update($request,$id);
        return back();
    }
    public function show(Project $project){
        $todo = $this->repo->todos($project);
        $done = $this->repo->dones($project);
        $projects = \request()->user()->projects()->pluck('name','id');
        return view('projects.show',compact('project','todo','done','projects'));
    }
}
