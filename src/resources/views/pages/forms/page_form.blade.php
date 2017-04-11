@push('styles')

@endpush

<div class="form-group">
    {!! Form::label('name',trans('lightpages::lightpages.page_name').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('data['.$lang->lang.'][name]',(isset($page->name))?$page->name:'',['id' => 'name' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title',trans('lightpages::lightpages.page_title').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('data['.$lang->lang.'][title]',(isset($page->title))?$page->title:'',['id' => 'title' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('slug',trans('lightpages::lightpages.page_url').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('data['.$lang->lang.'][slug]',(isset($page->slug))?$page->slug:'',['id' => 'slug' , 'class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('content',trans('lightpages::lightpages.page_content').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::textarea('data['.$lang->lang.'][content]',(isset($page->content))?$page->content:'',['id' => "content_".$lang->id , 'class'=>'form-control content']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('active',trans('lightpages::lightpages.page_state').': ',['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::select('data['.$lang->lang.'][state]',[1=>trans('lightpages::lightpages.page_enabled'),0=>trans('lightpages::lightpages.page_disabled')],(isset($page->state))?$page->state:'1',['id' => "content_".$lang->id , 'class'=>'form-control']) !!}
    </div>
</div>
{!! Form::hidden('data['.$lang->lang.'][lang_id]',$lang->id) !!}
<div class="form-group">
    <div class="col-lg-3 pull-right">
        {!! Form::submit($submitText,['class'=>'btn btn-primary form-control']) !!}
    </div>
</div>

@push('scripts')
@endpush