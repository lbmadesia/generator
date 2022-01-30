@extends ('backend.layouts.app')

@section ('title')
 Modules Management
@endsection

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
                            <th>{{ trans('generator::labels.modules.table.name') }}</th>
                            <th>{{ trans('generator::labels.modules.table.view_permission_id') }}</th>
                            <th>{{ trans('generator::labels.modules.table.url') }}</th>
                            <th>{{ trans('generator::labels.modules.table.created_by') }}</th>
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