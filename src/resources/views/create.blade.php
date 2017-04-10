
@extends('lightpages::layout.layout')


@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Новая страница</h3>
        </div>
        {!! Form::open(['route'=>'pages.store','class'=>'form-horizontal']) !!}
        <div class="box-body">
            @include('lightpages::forms.page_form',['submitText'=>'Создать'])
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop