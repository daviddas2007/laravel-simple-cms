@extends('layouts.admin_default')


@section('title')
{{ getSetting('site_shortname') }} | Slider Settings
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
@stop


@section('script')
 <script src="{{ URL::asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> 
 <script src="{{ URL::asset('public/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
@stop


@section('content') 

<div class="row">
  <div class="col-md-12">
     <div class="box">



        <form accept-charset="utf-8" class="form-vertical" enctype="multipart/form-data"  method="POST" action="">
          {{ csrf_field() }}
          <div class="box-header">
            <h3 class="box-title">Slider Settings</h3>
          </div>

          <div class="box-body">
             @if(session()->has('message'))
            <div  class="row">
              <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <p style="text-align: center">{{ session()->get('message') }}</p>
                  </div>
               </div>
            </div>
            @endif
            <div  class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('slider_min_width') ? ' has-error' : '' }}">
                        <label>Slider Min Width</label>
                         <input type="text" name="slider_min_width"  value="{{ getSetting('slider_min_width') }}" placeholder="Min Width" class="form-control">
                         @if ($errors->has('slider_min_width'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('slider_min_width') }}</strong>
                              </span>
                          @endif
                          <span class="help-block">Deafult slider min width available when group width is null</span>
                    </div>     
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('slider_min_height') ? ' has-error' : '' }}">
                        <label>Slider Min Height</label>
                         <input type="text" name="slider_min_height"  value="{{ getSetting('slider_min_height') }}" placeholder="Min Height" class="form-control">
                         @if ($errors->has('slider_min_height'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('slider_min_height') }}</strong>
                              </span>
                          @endif
                         <span class="help-block">Deafult slider min height available when group height is null</span>
                    </div>     
                </div>
            </div>


            <div  class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Slider Image Upadate</label>
                        <select name="slider_image_update"  value="{{ getSetting('slider_image_update') }}"  class="form-control">
                            <option value="0" @if(getSetting('slider_image_update') == 0) selected @endif>Keep</option>
                            <option value="1" @if(getSetting('slider_image_update') == 1) selected @endif>Delete</option>
                        </select>
                        <span class="help-block">Unlink or keep image on slider update</span>
                    </div>     
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Slider Image Types.</label>
                        <input type="text" name="slider_image_types"  value="{{ getSetting('slider_image_types') }}" placeholder="Image Types" class="form-control">
                        <span class="help-block">jpeg,jpg,bmp,png,gif</span>
                        
                    </div>     
                </div>
            </div>
            
          </div>
          <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-floppy-o"></i> Save
              </button> 
          </div>
          </form>   
      </div>         
  </div>
   
</div>


@endsection

