@extends('admin_layouts.inc')
@section('title','قيم الشركة')
@section('breadcrumb','قيم الشركة')
@section('styles')
  <link href="{{ asset('/admin_ui/assets/layouts/layout4/css/image.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Main content -->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <i class="icon-settings font-dark"></i>
          <span class="caption-subject bold uppercase">قيم الشركة</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
          <div class="table-toolbar">
              <div class="row">
                  <div class="col-md-6">
                      <div class="btn-group">
                          <button  data-toggle="modal" data-target="#addModal" id="sample_editable_1_new" class="btn btn-primary">
                              أضافة قيمة للشركة
                              <i class="fa fa-plus"></i>
                          </button>
                      </div>
                  </div>
              </div>
          </div>
              <table class="table table-striped table-bordered table-hover table-header-fixed" id="company">
                <thead>
                <th class="col-md-1">القيمة</th>
                <th class="col-md-1">Company valuable</th>
                <th class="col-md-1">الوصف</th>
                <th class="col-md-4">Description</th>
                <th class="col-md-4">الأيكون</th>
                <th class="col-md-1">خيارات</th>
                </thead>
                <tbody>
                @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->title_ar }}</td>
                    <td>{{  $row->title_en }}</td>
                    <td>{{  $row->desc_ar }}</td>
                    <td>{{  $row->desc_en }}</td>
                    <td>{!! $row->icon !!}</td>
                    <td>{!! $row->actions !!}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
      @include('admin_layouts.Add_imgModal')
      @include('admin_layouts.Edit_imgModal')

      @endsection

      @section('scripts')
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/multipart_insert.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/upload.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/app.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                oTable = $('#company').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,
                    'paging'      : true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json"
                    },
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false,
                    "ajax": {{ $tableData->getData()->recordsFiltered }},
                    "columns": [
                        {data: 'title_ar', name: 'title_ar'},
                        {data: 'title_en', name: 'title_en'},
                        {data: 'desc_ar', name: 'desc_ar'},
                        {data: 'desc_en', name: 'desc_en'},
                        {data: 'icon', name: 'icon'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                    ]
                })
            });
        </script>
        <script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>
      @endsection
