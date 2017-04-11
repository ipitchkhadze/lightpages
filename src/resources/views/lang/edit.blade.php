@extends('lightpages::layout.layout')

@section('styles')

@endsection

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('lightpages::lightpages.edit_lang')}} {{ $lang->name }}</h3>
        </div>
        {!! Form::model($lang,['route'=>['lang.update',$lang->id],'method' => 'patch','class'=>'form-horizontal']) !!}
        <div class="box-body">
            @include('lightpages::lang.forms.lang_form',['submitText'=>trans('lightpages::lightpages.update')])
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('scripts')
@endsection