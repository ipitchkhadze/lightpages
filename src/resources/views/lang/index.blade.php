@extends('lightpages::layout.layout')


@section('styles')
<link href="/vendor/lightpages/js/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="/vendor/lightpages/js/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@stop

@section('title')

@stop

@section('header')

@stop

@section('content')
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{trans('lightpages::lightpages.lang_list')}}</h3>&nbsp;&nbsp;&nbsp; <a class="btn btn-sm btn-primary" href="{{route('lang.create')}}"><i class="fa fa-plus"></i></a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="langs-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>{{trans('lightpages::lightpages.lang_name')}}</th>
                            <th>{{trans('lightpages::lightpages.lang_short')}}</th>
                            <th>{{trans('lightpages::lightpages.creation_date')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>{{trans('lightpages::lightpages.lang_name')}}</th>
                            <th>{{trans('lightpages::lightpages.lang_short')}}</th>
                            <th>{{trans('lightpages::lightpages.creation_date')}}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/vendor/lightpages/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/lightpages/js/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script>

$(document).ready(function () {

    var table = $('#langs-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Payments'},
            {extend: 'pdf', title: 'Payments'},
            {extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ],
        ajax: '{!! route('lang.data') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'lang', name: 'lang', className: 'lang'},
            {data: 'created_at', name: 'pages.created_at'},
            {data: 'action', name: 'action', searchable: false, orderable: false},
        ],
        "order": [
            [3, "desc"]
        ],
        "language": {
            "processing": "{{trans('lightpages::lightpages.processing')}}",
            "search": "{{trans('lightpages::lightpages.search')}}",
            "lengthMenu": "{{trans('lightpages::lightpages.lengthMenu')}}",
            "info": "{{trans('lightpages::lightpages.info')}}",
            "infoEmpty": "{{trans('lightpages::lightpages.infoEmpty')}}",
            "infoFiltered": "{{trans('lightpages::lightpages.infoFiltered')}}",
            "infoPostFix": "",
            "loadingRecords": "{{trans('lightpages::lightpages.loadingRecords')}}",
            "zeroRecords": "{{trans('lightpages::lightpages.zeroRecords')}}",
            "emptyTable": "{{trans('lightpages::lightpages.emptyTable')}}",
            "paginate": {
                "first": "{{trans('lightpages::lightpages.first')}}",
                "previous": "{{trans('lightpages::lightpages.previous')}}",
                "next": "{{trans('lightpages::lightpages.next')}}",
                "last": "{{trans('lightpages::lightpages.last')}}"
            },
            "aria": {
                "sortAscending": "{{trans('lightpages::lightpages.sortAscending')}}",
                "sortDescending": "{{trans('lightpages::lightpages.sortDescending')}}"
            }
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', 'a.destroy', function (e) {
        e.preventDefault(); // does not go through with the link.

        var $this = $(this);
        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            var d = JSON.parse(data)
            if (d.status === 'success') {
                console.log('Table reloaded');
                table.ajax.url('{!! route("lang.data") !!}').load();
            }
        });
    });
});
</script>
@stop