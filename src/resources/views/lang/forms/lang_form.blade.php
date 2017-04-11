@push('styles')

@endpush

<div class="form-group">
    {!! Form::label('name',trans('lightpages::lightpages.lang_name').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('name',null,['id' => 'name' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lang',trans('lightpages::lightpages.lang_short').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('lang',null,['id' => 'lang' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-3 pull-right">
        {!! Form::submit($submitText,['class'=>'btn btn-primary form-control']) !!}
    </div>
</div>

@push('scripts')
@endpush