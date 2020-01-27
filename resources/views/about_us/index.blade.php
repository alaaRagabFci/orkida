@extends('admin_layouts.inc')
@section('title','من نحن')
@section('breadcrumb','من نحن')
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
          <span class="caption-subject bold uppercase">بيانات من نحن</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="about">
                <thead>
                  <th class="col-md-1">الوصف</th>
                  <th class="col-md-1">Description</th>
                  <th class="col-md-1">الرؤيه</th>
                  <th class="col-md-1">Vision</th>
                  <th class="col-md-1">المهمه</th>
                  <th class="col-md-1">Goal</th>
                  <th class="col-md-1">خيارات</th>
                </thead>
                <tbody>
                  @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->description_ar }}</td>
                    <td>{{  $row->description_en }}</td>
                    <td>{{  $row->vision_ar }}</td>
                    <td>{{  $row->vision_en }}</td>
                    <td>{{  $row->goal_ar }}</td>
                    <td>{{  $row->goal_en }}</td>
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

      @include('admin_layouts.Edit_Modal')

      @endsection

      @section('scripts')
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/insert.js')}}" type="text/javascript"></script>
      <script type="text/javascript">
       $(document).ready(function() {
        oTable = $('#about').DataTable({
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
          {data: 'vision_ar', name: 'vision_ar'},
          {data: 'vision_en', name: 'vision_en'},
          {data: 'goal_ar', name: 'goal_ar'},
          {data: 'goal_en', name: 'goal_en'},
          {data: 'actions', name: 'actions', orderable: false, searchable: false}
          ]
        })
      });
    </script>
    @endsection
