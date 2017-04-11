@extends('lightpages::layout.layout')


@section('styles')
<link href="/vendor/lightpages/js/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="/vendor/lightpages/js/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@stop

@section('title')
Модуль страниц
@stop

@section('header')

@stop

@section('content')
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список страниц</h3>&nbsp;&nbsp;&nbsp; <a class="btn btn-sm btn-primary" href="{{route('pages.create')}}"><i class="fa fa-plus"></i></a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="pages-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Наименование</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Дата</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Наименование</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Дата</th>
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

    var table = $('#pages-table').DataTable({
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
        ajax: '{!! route('pages.data') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'title', name: 'title', className: 'title'},
            {data: 'slug', name: 'slug'},
            {data: 'created_at', name: 'pages.created_at'},
            {data: 'action', name: 'action', searchable: false, orderable: false},
        ],

        "order": [
            [4, "desc"]
        ],
        "language": {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "infoPostFix": "",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
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
                table.ajax.url( '{!! route('pages.data') !!}' ).load();
            }
        });
    });

});
</script>
@stop