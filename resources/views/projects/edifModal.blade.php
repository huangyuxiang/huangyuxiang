<!-- Modal -->
<div class="modal fade" id="updatePojectModal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="updatePojectModal-{{$value->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">编辑项目</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($value,['route'=>['projects.update','id'=>$value->id],'method'=>'patch','files'=>true]) !!}
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('name','项目名称') !!}
                  {!! Form::text('name',null,['class'=>'form-control']) !!}
                  {!! $errors->getBag('update_'.$value->id)->first('name','<div class="alert alert-danger">:message</div>') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name','项目名称') !!}
                    {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
                    {!! $errors->getBag('update_'.$value->id)->first('thumbnail','<div class="alert alert-danger">:message</div>') !!}
                </div>
              {{--  @if($errors->any())
                    <ul class="alert alert-danger">
                    @foreach($errors->all() as $value)
                        <li>{{$value}}</li>
                    @endforeach
                    </ul>
                @endif--}}
            </div>
            <div class="modal-footer">
               {!! Form::submit('编辑项目',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>