@extends('lightpages::layout.layout')


@section('content')
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список страниц</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="payments-table">
                    <thead>
                        <tr>
                            <th>Basis_id</th>
                            <th>E-mail</th>
                            <th>Наименование</th>
                            <th>Статус</th>
                            <th>Места</th>
                            <th>Цена</th>
                            <th>Дата</th>
                            <th>Дата Мероприятия</th>
                            <th>Печать</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Basis_id</th>
                            <th>E-mail</th>
                            <th>Наименование</th>
                            <th>Статус</th>
                            <th>Места</th>
                            <th>Цена</th>
                            <th>Дата</th>
                            <th>Дата Мероприятия</th>
                            <th class="non_searchable" >Печать</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/vendors/lightpages/js/plugins/dataTables.min.js"></script>

<script>

    $(document).ready(function () {

        var table = $('#payments-table').DataTable({
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
                {data: 'basis_order', name: 'basis_order'},
                {data: 'email', name: 'email'},
                {data: 'event_name', name: 'event_name', className: 'event_name'},
                {data: 'description', name: 'description', orderable: false},
                {data: 'placement', name: 'placement', searchable: false, orderable: false, className: 'event_places'},
                {data: 'price', name: 'price', searchable: false, className: 'event_price'},
                {data: 'created_at', name: 'payments.created_at'},
                {data: 'date', name: 'date', searchable: false, className: 'event_date'},
                {data: 'pbtn', name: 'pbtn', searchable: false, orderable: false}
            ],
            
            "order": [
                [6, "desc"]
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