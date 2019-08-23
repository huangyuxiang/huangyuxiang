@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['route'=>'tasks.store','method'=>'POST']) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-plus"></i></div>
            </div>
          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'暂时输入']) !!}
        </div>
        {!! $errors->getBag('create')->first('name','<div class="alert alert-danger">:message</div>') !!}
        {!! $errors->getBag('create')->first('project_id','<div class="alert alert-danger">:message</div>') !!}
        {!! Form::hidden('project_id',$project->id) !!}
        {!! Form::close() !!}

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="home" aria-selected="true">代办事项<span class="badge badge-pill badge-danger">{{count($todo)}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="profile" aria-selected="false">已完成<span class="badge badge-pill badge-success">{{count($done)}}</span></a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="todo" role="tabpanel" aria-labelledby="home-tab">
                @if(count($todo)>0)
                    <table class="table table-striped">
                        @foreach($todo as $task)
                            <tr>
                                <td><span class="badge badge-secondary">{{$task->updated_at->diffForHumans()}}</span><a href="{{route('tasks.show',$task->id)}}">{{$task->name}}</a></td>
                                <td>
                                    {!!Form::open(['route'=>['tasks.check',$task->id]])!!}
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    {!!Form::close()!!}
                                </td>
                                <td>
                                    <!-- 编辑弹窗 按钮 -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTask-{{$task->id}}">
                                            <i class="fa fa-cog"></i>
                                        </button>

                                        <!-- 编辑弹窗 -->
                                        <div class="modal fade" id="editTask-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="editTask-{{$task->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTask-{{$task->id}}">编辑任务</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! $errors->getBag('update')->first('name','<div class="alert alert-danger">:message</div>') !!}
                                                    {!! $errors->getBag('update')->first('project_id','<div class="alert alert-danger">:message</div>') !!}
                                                    {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'PATCH']) !!}
                                                        <div class="modal-body">
                                                            {!! Form::label('name','任务名称') !!}
                                                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::label('name','所属项目') !!}
                                                            {!! Form::select('project',$projects,$project->id,['class'=>'form-control']) !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::submit('编辑任务',['class'=>'btn btn-primary']) !!}
                                                        </div>
                                                    {!!Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    <!-- 删除 按钮 -->
                                    {!!Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'delete'])!!}
                                     <button type="submit" class="btn btn-danger btn-sm">
                                         <i class="fa fa-close"></i>
                                     </button>
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
            <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="profile-tab">
                @if(count($done)>0)
                    <table class="table table-striped">
                        @foreach($done as $task)
                            <tr>
                                <td><span class="badge badge-secondary">{{$task->updated_at->diffForHumans()}}</span>{{$task->name}}</td>
                                <td>
                                    {!! Form::open(['route'=>['tasks.check',$task->id]]) !!}
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    {!!Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection