@extends('layouts.admin_default')


@section('title')
{{ getSetting('site_shortname') }} | Sliders
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
@stop


@section('script')
 <script src="{{ URL::asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> 
 <script src="{{ URL::asset('public/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
 <script src="{{ URL::asset('public/admin/js/sliders.js')}}"></script>
 <script type="text/javascript">

var oTable;
$(document).ready(function(){
   

    oTable = $('#example1').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{{ URL::to("admin/sliders/get") }}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#page-page-list .search_bar input, #page-page-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },
        "order": [[ 4, "desc" ]],

        "columns": [
            
            {data :'title'},
            {data :'image'},
            {data :'group'},
            {data :'status'},
            {data :'created_at'},
            {data :'action'},
       
        ],
        "pageLength": 10
    });

    $("#page-page-list .search_bar input, #page-page-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
@stop


@section('content') 

<div class="row">
    <div class="col-md-8">
       <div class="box">
           <div class="box-header">
              <h3 class="box-title">Slider Listings</h3>
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#response" data-href="{{URL::to('admin/sliders/create')}}">
                  <i class="fa fa-plus-circle"></i> Create Slider
                  </button>                     
              </div>
            </div>
            <div class="box-body">
              <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Group</th>
                  <th>Status</th>
                  <th>Created On</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
             
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
     
               
                </tbody>
              </table>
            </div>
        </div>    
    </div>
    <div class="col-md-4">
      <div id="response">
         @include('backend.sliders.create')
      </div>  
    </div>
    
</div>


@endsection

