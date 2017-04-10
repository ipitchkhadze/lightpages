@push('styles')

@endpush

<div class="form-group">
    {!! Form::label('name','Название страницы: ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('name',null,['id' => 'name' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title','Title: ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('title',null,['id' => 'title' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('slug','URL: ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('slug',null,['id' => 'slug' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('content','Содержание страницы: ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::textarea('content',null,['id' => 'content' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-3 pull-right">
        {!! Form::submit($submitText,['class'=>'btn btn-primary form-control']) !!}
    </div>
</div>

@push('scripts')
@endpush