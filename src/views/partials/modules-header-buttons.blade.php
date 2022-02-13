@if(request()->is('admin/modules*'))
 {{-- action header button --}}
<div class="btn-group float-right">
<div class="dropdown">
    <button type="button" class="btn border mx-2 dropdown-toggle" data-toggle="dropdown">
    Action
    </button>
    <div class="dropdown-menu">
       <a href="{{route('admin.modules.index')}}" class="dropdown-item"><i class="fa fa-list-ul"></i> {{ trans('generator::menus.modules.all') }}</a>
       <a href="{{route('admin.modules.create')}}" class="dropdown-item"><i class="fa fa-plus"></i> {{ trans('generator::menus.modules.create') }}</a>
  </div>
    </div>
</div>
{{-- export header button --}}
{{-- <div class="btn-group float-right">
    <div class="dropdown">
    <button type="button" class="btn border mx-2 dropdown-toggle" data-toggle="dropdown">
        Export
    </button>
      <div class="dropdown-menu">
        <a id="copyButton" href="#" class="dropdown-item"><i class="fa fa-clone"></i> {{ trans( 'partials.backend.export.copy' ) }}</a>
        <a id="csvButton" href="#" class="dropdown-item"><i class="fa fa-file-text-o"></i> {{ trans( 'partials.backend.export.csv' ) }}</a>
        <a id="excelButton" href="#" class="dropdown-item"><i class="fa fa-file-excel-o"></i> {{ trans( 'partials.backend.export.excel' ) }}</a>
        <a id="pdfButton" href="#" class="dropdown-item"><i class="fa fa-file-pdf-o"></i> {{ trans( 'partials.backend.export.pdf' ) }}</a>
        <a id="printButton" href="#" class="dropdown-item"><i class="fa fa-print"></i> {{ trans( 'partials.backend.export.print' ) }}</a> 
    </div>
    </div>
</div>  --}}

@endif
    
