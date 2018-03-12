<div class="box">
   <form  enctype="multipart/form-data" class="form-vertical" id="create-sliders" method="POST" action='{{ URL::to("admin/sliders/groups/update/{$list->id}")}}'>
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Edit Slider Group</h3>
            <div class="box-tools pull-right">
                  <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#response" data-href="{{URL::to('admin/sliders/groups/create')}}">
                  <i class="fa fa-plus-circle"></i> Create Slider Group
                  </button>                     
            </div>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Slider Group Name</label>
                           <input type="text" name="name" required  value="{{$list->name}}" class="form-control">
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Min Width</label>
                           <input type="text" name="width"   value="{{$list->width}}" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Min Height</label>
                           <input type="text" name="height"   value="{{$list->height}}" class="form-control">
                      </div>     
                  </div>
              </div>


              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Thumb Width</label>
                           <input type="text" name="thumb_width"   value="{{$list->thumb_width}}" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Thumb Height</label>
                           <input type="text" name="thumb_height"   value="{{$list->thumb_height}}" class="form-control">
                      </div>     
                  </div>
              </div>






              <div  class="row">
                  <div class="col-md-12">
                       <div class="form-group">
                          <label>Slider Group Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], $list->status,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="UPDATE" data-form="#create-sliders" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Update
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-form="#create-sliders">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         