@extends('lightpages::layout.layout')


@section('styles')
<link href="/vendor/lightpages/js/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="/vendor/lightpages/js/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список страниц</h3>
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
                {data: 'action', name: 'action',searchable: false, orderable: false},
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
    });
</script>
@stop