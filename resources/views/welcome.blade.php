@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($projects)>0)
            <div class="card-deck">
                @foreach($projects as $value)
                    <div class="col-3">
                    <div class="card">
                        <ul class="icon-bar">
                            {!! Form::open(['url'=>route('projects.destroy',['id'=>$value->id]),'method'=>'delete']) !!}
                            <li><button class="btn btn-default" type="submit"><i class="fa fa-btn fa-times"></i></button></li>
                            {!! Form::close() !!}
                            <li>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatePojectModal-{{$value->id}}">
                                <i class="fa fa-btn fa-cog"></i>
                            </button>
                            </li>
                        </ul>
                        <a  href="{{route('projects.show',['id'=>$value->id])}}">
                        <img src="{{asset('/storage/thumb/original/'.$value->thumbnail)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$value['name']}}</h5>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted">{{$value['add_time']}}</small></p>
                        </div>
                        </a>
                    </div>
                    </div>
                @include('projects.edifModal')
                @endforeach
                </div>
        @endif

        @include('projects.createModal')
    </div>
@endsection
@section('cardJS')
    <script>
        $(document).ready(function () {
            $('.icon-bar').hide();
            $('.card').hover(function (e) {
                $(this).find('.icon-bar').toggle();
            })
        });
    </script>
@endsection