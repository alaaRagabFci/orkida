@extends('admin_layouts.inc')
@section('title','الطلبات')
@section('breadcrumb','الطلبات')
@section('styles')
@endsection
@section('content')
<!-- Main content -->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-green-haze">
          <i class="icon-settings font-green-haze"></i>
          <span class="caption-subject bold uppercase">الطلبات</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="orders">
                <thead>
                  <th class="col-md-1">الأسم</th>
                  <th class="col-md-1">البريد الألكتروني</th>
                  <th class="col-md-1">رقم الهاتف</th>
                  <th class="col-md-1">عنوان الرساله</th>
                  <th class="col-md-1">الرساله</th>
                </thead>
                <tbody>
                  @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->name }}</td>
                    <td>{{  $row->email }}</td>
                    <td>{{  $row->phone }}</td>
                    <td>{{  $row->topic_title }}</td>
                    <td>{{  $row->message }}</td>
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
      <script type="text/javascript">
       $(document).ready(function() {
        oTable = $('#orders').DataTable({
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
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'phone', name: 'phone'},
          {data: 'topic_title', name: 'topic_title'},
          {data: 'message', name: 'message'}
          ]
        })
      });
    </script>
    @endsection
