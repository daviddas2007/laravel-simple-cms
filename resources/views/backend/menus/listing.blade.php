@extends('layouts.admin_default')


@section('title')
{{ getSetting('site_shortname') }}| Menus
@stop

@section('subtitle')
<h1>Menus <small> Manage Menus</small></h1>
@stop

@section('breadcrumbs')
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol>
@stop

@section('style')
<link rel="stylesheet" href="{{ URL::asset('public/plugins/nestable/jquery.nestable.css')}}">
@stop

@section('script')
<script src="{{ URL::asset('public/plugins/nestable/jquery.nestable.js') }}"></script>
<script src="{{ URL::asset('public/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('public/admin/js/menu.js') }}"></script>
<script type="text/javascript">
  var updateMenu = function(e)
    {
        var out = $(e.target).nestable('serialize');
        out     = JSON.stringify(out);

        var formData = new FormData();
        formData.append('tree', out);


        var href  = $('.nav-tabs li.active a').prop("href");
        var id    = $('.nav-tabs li.active').data("id");

        var url   = href+'/'+id;

        $.ajax( {
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success:function (data, textStatus, jqXHR)
            {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    }; 

    
   $('.dd').nestable().on('change', updateMenu);
</script>
@stop


@section('content') 

<div class="row">
    <div class="col-md-5">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom" id="menu-tabs">
        <ul class="nav nav-tabs">
          @foreach($menuGroup as $value) 

           <?php
              $active = '';
              if($menuSlug == $value->slug)
                 $active = "active";
              elseif(empty($menuSlug) && ($menuDetail->slug == $value->slug)) 
                 $active = "active"; 
             
           
            ?>

          <li class="{{$active}}" data-id="{{$value->id}}">
             <a href="{{url('admin/menu/'.$value->slug)}}">{{$value->name}}</a>
          </li>
          @endforeach

          @if($menuSlug =="create" || $menuGroup->count() == 0 )
          <li class="active" data-id="new">
             <a href="javascript:void(0);">New</a>
          </li>
          @endif

          <li class="pull-right"><a href="{{url('admin/menu/create')}}" class="text-muted"><i class="fa fa-plus-circle"></i></i></a></li>
        </ul>
        <div class="tab-content">
    
          @foreach($menuGroup as $value)

            <?php

              $active = '';
              if($menuSlug == $value->slug)
                 $active = "active";
              elseif(empty($menuSlug) && ($menuDetail->slug == $value->slug)) 
                 $active = "active"; 
             
                 $key =  $value->key;    
           
            ?>
            <div class="tab-pane {{$active}}" id="{{$key}}">
                  
             
                      <div class="dd" id="nestable">
                          <ol class="dd-list">
                             @each('backend.menus.nesting', $items, 'item', 'backend.menus.nothing')
                          </ol>  
                      </div>
                     
                     
            </div>

           @endforeach

    

           @if($menuSlug =="create" || $menuGroup->count() == 0 )
           <div class="tab-pane active" id="new">        
                      <div class="callout callout-info">  
                        <p>create a new menu on right side create menu form </p>
                      </div>

            </div>
            @endif
         
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->

    <div class="col-md-7">
      <div class="box box-primary">
         <div id="menu-entry">
            @if(empty($menuDetail) || $menuSlug == "create")
            
                @include('backend.menus.menu.create')

            @else

                @include('backend.menus.menu.update',$menuDetail)

            @endif

          </div>

      </div>
    
   </div>
<!-- /.col -->





@endsection

