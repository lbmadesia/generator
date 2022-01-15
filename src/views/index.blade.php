@extends ('backend.layouts.app')

@section ('title')
 Modules Management
@endsection

{{-- @section('page-header')
<div class="w-100 d-flex justify-content-between align-items-center pt-3 px-3" style="border-bottom:2px solid #ccc;">
     <p><b class="lbindectionName text-dark">{{ trans('labels.backend.modules.management') }}</b> / Module List</p>
    <p></p>
 </div>
@endsection --}}

@section('content')
 <div class="p-3">
    <div class="col-md-12 bg-white py-3 px-2 shadow-lg bordertop-5 ">
        <div class="row text-dark">
            <div class="col-md-6"><b>Active Modules</b></div>
            <div class="col-md-6"> @include('generator::partials.modules-header-buttons') </div>
        </div>

         <div class="table-parent py-4">
            <div class="table-responsive data-table-wrapper">
                <table id="modules_table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.modules.table.name') }}</th>
                            <th>{{ trans('labels.backend.modules.table.view_permission_id') }}</th>
                            <th>{{ trans('labels.backend.modules.table.url') }}</th>
                            <th>{{ trans('labels.backend.modules.table.created_by') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div>
    </div>
@endsection

@section('bottom-scripts')
    {{-- For DataTables --}}
    {{-- {{ Html::script(mix('js/dataTable.js')) }} --}}
    
    {{-- <script>
        $(function() {
            var dataTable = $('#modules_table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.modules.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: '{{config('module.table')}}.name'},
                    {data: 'view_permission_id', name: '{{config('module.table')}}.view_permission_id'},
                    {data: 'url', name: '{{config('module.table')}}.url'},
                    {data: 'created_by', name: '{{config('access.users_table')}}.first_name'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }}
                    ]
                }
            });

            (function (dataTable) {

                // Header All search columns
                $("div.dataTables_filter input").unbind();
                $("div.dataTables_filter input").keypress( function (e)
                {
                    if (e.keyCode == 13)
                    {
                        dataTable.fnFilter( this.value );
                    }
                });

                // Individual columns search
                $('.search-input-text').on( 'keypress', function (e) {
                    // for text boxes
                    if (e.keyCode == 13)
                    {
                        var i =$(this).attr('data-column');  // getting column index
                        var v =$(this).val();  // getting search input value
                        dataTable.api().columns(i).search(v).draw();
                    }
                });

                // Individual columns search
                $('.search-input-select').on( 'change', function (e) {
                    // for dropdown
                    var i =$(this).attr('data-column');  // getting column index
                    var v =$(this).val();  // getting search input value
                    dataTable.api().columns(i).search(v).draw();
                });

                // Individual columns reset
                $('.reset-data').on( 'click', function (e) {
                    var textbox = $(this).prev('input'); // Getting closest input field
                    var i =textbox.attr('data-column');  // Getting column index
                    $(this).prev('input').val(''); // Blank the serch value
                    dataTable.api().columns(i).search("").draw();
                });

                //Copy button
                $('#copyButton').click(function(){
                    $('.copyButton').trigger('click');
                });
                //Download csv
                $('#csvButton').click(function(){
                    $('.csvButton').trigger('click');
                });
                //Download excelButton
                $('#excelButton').click(function(){
                    $('.excelButton').trigger('click');
                });
                //Download pdf
                $('#pdfButton').click(function(){
                    $('.pdfButton').trigger('click');
                });
                //Download printButton
                $('#printButton').click(function(){
                    $('.printButton').trigger('click');
                });

                var id = $('.table-responsive .dataTables_filter').attr('id');
                $('#'+id+' label').append('<a class="reset-data" id="input-sm-reset" href="javascript:void(0)"><i class="fa fa-times"></i></a>');
                $(document).on('click', "#"+id+" label #input-sm-reset", function(){
                    dataTable.fnFilter('');
                });
            }(dataTable));
        });
    </script> --}}


<script type="text/javascript">
   $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $('#modules_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.modules.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'modules.name'},
                    {data: 'view_permission_id', name: 'modules.view_permission_id'},
                    {data: 'url', name: 'modules.url'},
                    {data: 'created_by', name: 'users.name'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
         });
 

});
</script>
@endsection