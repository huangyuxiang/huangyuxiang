<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPojectModal">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="createPojectModal" tabindex="-1" role="dialog" aria-labelledby="createPojectModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">创建项目</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url'=>route('projects.store'),'method'=>'post','files'=>true]) !!}
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('name','项目名称') !!}
                  {!! Form::text('name','',['class'=>'form-control']) !!}
                    {!! $errors->getBag('create')->first('name','<div class="alert alert-danger">:message</div>') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','项目名称') !!}
                    {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
                    {!! $errors->getBag('create')->first('thumbnail','<div class="alert alert-danger">:message</div>') !!}
           {{--     </div>
                @if($errors->any())
                    <ul class="alert alert-danger">
                    @foreach($errors->all() as $value)
                        <li>{{$value}}</li>
                    @endforeach
                    </ul>
                @endif--}}
            </div>
            <div class="modal-footer">
               {!! Form::submit('新建项目',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>