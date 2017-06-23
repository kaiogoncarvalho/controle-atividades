@extends('layouts.app')

@section('title')
    @lang('home.title')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table cellpadding="3" cellspacing="0" border="0" style="width: 50%; margin: 0 auto 2em auto;">
                        <thead>
                        <tr>
                            <th colspan="2" style="text-align: center">Filtrar</th>
                        </tr>
                        <tr>
                            <th>Coluna</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="filter_global">
                            <td>Status</td>
                            <td align="center">
                                <select id="col4_filter" class="form-control col-sm-8 col-offset-sm-2">
                                    <option></option>
                                    <option value="1">Opção 1</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="filter_col1" data-column="0">
                            <td>Situação</td>
                            <td align="center">
                                <select id="col4_filter" class="form-control">
                                    <option></option>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data de Ínicio</th>
                            <th>Data de Fim</th>
                            <th>Status</th>
                            <th>Situação</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready( function () {

        function filterColumn ( i ) {
            $('#example').DataTable().column( i ).search(
                $('#col'+i+'_filter option:selected').val()
            ).draw();
        }

       var table = $('#example').DataTable({

            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "ajax": "activities",
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json",
                select: {
                    rows: {
                        _: "Você selecionou %d linhas",
                        0: "",
                        1: "Você selecionou 1 linha"
                    }
                }
            },
            "columns": [
                {
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { "data": "name" },
                { "data": "description" },
                { "data": "start_date" },
                { "data": "end_date" },
                { "data": "status_id" },
                { "data": "situation" }
            ],
            select: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    text: '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
                    className: 'btn btn-success',
                    action: function ( e, dt, node, config ) {
                        window.location.href = "activity/create";
                    }
                },
                {
                    text: '<span class="glyphicon glyphicon-pencil aria-hidden="true"></span>',
                    className: 'btn btn-default',
                    action: function ( e, dt, node, config ) {
                        var linha = table.rows( { selected: true } )[0][0];
                        var data = table.row(linha).data();
                        window.location.href = "activity/edit/"+data.id;
                    }
                },
                {
                    text: '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                    className: 'btn btn-danger',
                    action: function ( e, dt, node, config ) {
                        var linha = table.rows( { selected: true } )[0][0];
                        var data = table.row(linha).data();
                        window.location.href = "activity/delete/"+data.id;
                    }
                }
            ],
            columnDefs: [ {
                orderable: false,
                className: 'select-checkbox',
                targets:   0
            } ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
            order: [[ 1, 'asc' ]]
        });


        $('input.column_filter').on( 'change', function () {
            filterColumn( $(this).parents('tr').attr('data-column') );
        } );
    });
</script>

@endsection

@section('head')


@endsection

