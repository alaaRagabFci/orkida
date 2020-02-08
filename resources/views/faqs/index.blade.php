@extends('admin_layouts.inc')
@section('title','الأسئله الشائعه')
@section('breadcrumb','الأسئله الشائعه')
@section('styles')
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
          <span class="caption-subject bold uppercase">بيانات الأسئله الشائعه</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <a href="{{ url('/adminpanel/'.$modal.'/create') }}">
                <button  data-toggle="modal" id="sample_editable_1_new" class="btn btn-primary">
                  أضافة سؤال جديد <i class="fa fa-plus"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
              <table class="table table-striped table-bordered table-hover" id="faqs">
                <thead>
                  <th class="col-md-1">السؤال والاجابه</th>
                  <th class="col-md-1">Question & answer</th>
                  <th class="col-md-1">خيارات</th>
                </thead>
                <tbody>
                  @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->description_ar }}</td>
                    <td>{{  $row->description_en }}</td>
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

      @endsection

      @section('scripts')
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/insert.js')}}" type="text/javascript"></script>
      <script type="text/javascript">
       $(document).ready(function() {
        oTable = $('#faqs').DataTable({
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
          {data: 'description_ar', name: 'description_ar'},
          {data: 'description_en', name: 'description_en'},
          {data: 'actions', name: 'actions', orderable: false, searchable: false}
          ]
        })
      });
    </script>
    @endsection
