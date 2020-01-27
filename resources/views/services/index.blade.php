@extends('admin_layouts.inc')
@section('title','خدماتنا')
@section('breadcrumb','خدماتنا')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('styles')
  <link href="{{ asset('/admin_ui/assets/layouts/layout4/css/image.css')}}" rel="stylesheet" type="text/css" />
@endsection
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
          <span class="caption-subject bold uppercase">خدماتنا</span>
        </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
          <div class="table-toolbar">
              <div class="row">
                  <div class="col-md-6">
                      <div class="btn-group">
                          <a href="{{ url('/adminpanel/'.$modal.'/create') }}">
                              <button  data-toggle="modal" id="sample_editable_1_new" class="btn btn-primary">
                                أضافة خدمة جديده <i class="fa fa-plus"></i>
                              </button>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
              <table class="table table-striped table-bordered table-hover table-header-fixed" id="services">
                <thead>
                <th class="col-md-1">الترتيب</th>
                <th class="col-md-1">العنوان</th>
                <th class="col-md-1">Title</th>
                <th class="col-md-2">الوصف</th>
                <th class="col-md-2">Description</th>
                <th class="col-md-1">القسم</th>
                <th class="col-md-1">الصورة</th>
                <th class="col-md-1">خيارات</th>
                </thead>
                <tbody class="row_position">
                @foreach ($tableData->getData()->data as $row)
                  <tr>
                    <td>{{  $row->sort }}</td>
                    <td>{{  $row->name_ar }}</td>
                    <td>{{  $row->name_en }}</td>
                    <td>{!! $row->description_ar !!} </td>
                    <td>{!! $row->description_en !!} </td>
                    <td>{{  $row->category }}</td>
                    <td>{!! $row->image !!}</td>
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
        {{--<script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/multipart_insert.js')}}" type="text/javascript"></script>--}}
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/upload.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/admin_ui/assets/layouts/layout4/scripts/app.js') }}"></script>
        <script type="text/javascript">
            $( ".row_position" ).sortable({
                delay: 50,
                stop: function() {
                    var selectedData = new Array();
                    $('.row_position tr').each(function() {
                        selectedData.push($(this).attr("id"));
                    });
                    updateServiceSort(selectedData);

                }
            });

            function updateServiceSort(data) {
                $.ajax({
                    url: "{{ url('adminpanel/services/sort') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: Object.assign({}, data),
                    success: function(res){
                        oTable.draw();
                    },
                    error: function(){}
                });
            }

            $(document).ready(function() {
                oTable = $('#services').DataTable({
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
                        {data: 'sort', name: 'sort'},
                        {data: 'name_ar', name: 'name_ar'},
                        {data: 'name_en', name: 'name_en'},
                        {data: 'description_ar', name: 'description_ar'},
                        {data: 'description_en', name: 'description_en'},
                        {data: 'category', name: 'category'},
                        {data: 'image', name: 'image'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                    ],
                    order: [ [0, 'asc'] ]
                })
            });
        </script>
        <script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>
      @endsection
