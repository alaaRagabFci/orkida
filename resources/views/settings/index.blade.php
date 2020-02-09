@extends('admin_layouts.inc')
@section('title','الواجبات')
@section('breadcrumb','الواجبات')
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
        <div class="caption font-green-haze">
          <i class="icon-settings font-green-haze"></i>
          <span class="caption-subject bold uppercase">أعدادات الموقع</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover table-header-fixed" id="settings">
                <thead>
                <th class="col-md-1">الموقع</th>
                <th class="col-md-1">location</th>
                <th class="col-md-1">اللوجو</th>
                <th class="col-md-4">البريد الألكتروني</th>
                <th class="col-md-4">Facebook</th>
                <th class="col-md-4">Twitter</th>
                <th class="col-md-4">Youtube</th>
                <th class="col-md-4">Linkedin</th>
                <th class="col-md-4">Instgram</th>
                <th class="col-md-4">Pinterest</th>
                <th class="col-md-1">خيارات</th>
                </thead>
                <tbody>
                @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->location_ar }}</td>
                    <td>{{  $row->location_en }}</td>
                    <td>{!! $row->logo !!}</td>
                    <td>{{  $row->site_email }}</td>
                    <td>{{  $row->facebook_url }}</td>
                    <td>{{  $row->twitter_url }}</td>
                    <td>{{  $row->youtube_url }}</td>
                    <td>{{  $row->linkedin_url }}</td>
                    <td>{{  $row->instagram_url }}</td>
                    <td>{{  $row->pinterest_url }}</td>
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
      @include('admin_layouts.Edit_imgModal')

      @endsection

      @section('scripts')
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/multipart_insert.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/upload.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/app.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                oTable = $('#settings').DataTable({
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
                        {data: 'location_ar', name: 'location_ar'},
                        {data: 'location_en', name: 'location_en'},
                        {data: 'logo', name: 'logo'},
                        {data: 'site_email', name: 'site_email'},
                        {data: 'facebook_url', name: 'facebook_url'},
                        {data: 'twitter_url', name: 'twitter_url'},
                        {data: 'youtube_url', name: 'youtube_url'},
                        {data: 'linkedin_url', name: 'linkedin_url'},
                        {data: 'instagram_url', name: 'instagram_url'},
                        {data: 'pinterest_url', name: 'pinterest_url'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                    ]
                })
            });
        </script>
        <script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>
      @endsection
