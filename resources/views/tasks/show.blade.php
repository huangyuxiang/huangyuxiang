@extends('layouts.app')

@section('content')
  <div class="container" id="#app">
      <h3>{{$task->name}}</h3>
      <steps route="{{route('tasks.steps.index',['task_id'=>$task->id])}}"></steps>
  {{--    <button type="submit" class="btn btn-primary" @click="addStep">添加步骤</button>--}}
  </div>
@endsection