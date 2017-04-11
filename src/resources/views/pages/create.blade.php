@extends('lightpages::layout.layout')

@section('styles')
<link href="/vendor/lightpages/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('lightpages::lightpages.new_page')}}</h3>
        </div>
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <?php foreach ($langs as $k => $lang): ?>
                    <?php $active = ($k === 0) ? 'active' : ''; ?>
                    <li class="{{$active}}"><a href="#tab_{{$lang->id}}" data-toggle="tab" aria-expanded="true">{{$lang->name}}</a></li>
                <?php endforeach; ?>
            </ul>

            {!! Form::open(['route'=>'pages.store','class'=>'form-horizontal']) !!}
            <div class="tab-content">
                <?php foreach ($langs as $k => $lang): ?>
                    <?php $active = ($k === 0) ? 'active' : ''; ?>
                    <div class="tab-pane {{$active}}" id="tab_{{$lang->id}}">

                        <div class="box-body">
                            @include('lightpages::pages.forms.page_form',['submitText'=>trans('lightpages::lightpages.create')])
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
@stop

@section('scripts')
<script src="/vendor/lightpages/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script>
$(function () {
<?php foreach ($langs as $k => $lang): ?>
        $("#content_{{$lang->id}}").wysihtml5();
<?php endforeach; ?>
});
</script>
@endsection