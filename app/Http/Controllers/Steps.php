<?php

namespace App\Http\Controllers;

use App\Step;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Steps extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Task $task,Step $step)
    {

        $data = $task->steps()->get();
        return response()->json(
            ['steps'=>$data],200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Task $task
     * @param Request $request
     * @return void
     */
    public function store(Task $task,Request $request)
    {
        $step = $task->steps()->create([
                'name'=>$request->name
        ]);
        return response()->json([
            'step'=>$step
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @param Step $step
     * @return Response
     */
    public function show(Task $task,Step $step)
    {
        $data = $task->steps()->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Step $step
     * @return Response
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Step $step
     * @return Response
     */
    public function update(Request $request, Step $step)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Step $step
     * @return Response
     */
    public function destroy(Step $step)
    {
        //
    }
}
