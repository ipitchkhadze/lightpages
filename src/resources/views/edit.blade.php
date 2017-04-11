@extends('lightpages::layout.layout')

@section('styles')
<link href="/vendor/lightpages/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Редактировать страницу {{ $page->name }}</h3>
        </div>
        {!! Form::model($page,['route'=>['pages.update',$page->slug],'method' => 'patch','class'=>'form-horizontal']) !!}
        <div class="box-body">
            @include('lightpages::forms.page_form',['submitText'=>'Обновить'])
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('scripts')
<script src="/vendor/lightpages/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $("#content").wysihtml5();
    });
</script>
@endsection