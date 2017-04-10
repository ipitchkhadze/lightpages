
@extends('lightpages::layout.layout')


@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Редактировать страницу {{ $page->name }}</h3>
        </div>
        {!! Form::model($page,['route'=>['pages.update',$page->slug],'class'=>'form-horizontal']) !!}
        <div class="box-body">
            @include('lightpages::forms.page_form',['submitText'=>'Обновить'])
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop