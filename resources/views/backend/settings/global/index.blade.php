@extends('layouts.admin_default')


@section('title')
{{ getSetting('site_shortname') }} | Global Settings
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
                      <h3 class="box-title">Global Settings</h3>
                    </div>
                    <div class="box-body">
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Name</label>
                                     <input type="text" name="site_name"  value="{{ getSetting('site_name') }}" class="form-control">
                                </div>     
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Short Name</label>
                                     <input type="text" name="site_shortname"  value="{{ getSetting('site_shortname') }}" class="form-control">
                                </div>     
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logo Type</label>
                                     <select  name="logo_type" class="form-control">
                                        <option value="name" @if(getSetting('logo_type') == "name") selected @endif >Name</option>
                                        <option value="logo" @if(getSetting('logo_type') == "logo") selected @endif >Logo</option>
                                     </select>
                                </div>     
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Description</label>
                                     <input type="text" name="site_description"  value="{{ getSetting('site_description') }}" class="form-control">
                                </div>     
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Email</label>
                                     <input type="text" name="site_email"  value="{{ getSetting('site_email') }}" class="form-control">
                                </div>     
                            </div>
                        </div>
                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Logo</label>
                                    <img src="{{asset('public/uploads/'.getSetting('site_logo'))}}" >
                                    <input type="file" name="site_logo"  value="" class="form-control">
                                </div>     
                            </div>
                        </div>

                        <div  class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Copyright</label>
                                     <input type="text" name="site_copyright"  value="{{ getSetting('site_copyright') }}" class="form-control">
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

