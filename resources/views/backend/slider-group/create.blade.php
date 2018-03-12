<div class="box">
   <form class="form-vertical" enctype="multipart/form-data"  id="create-sliders" method="POST" action="{{ URL::to('admin/sliders/groups/insert') }}">
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Add Slider Group</h3>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required ">
                          <label>Slider Group Name</label>
                          <input type="text" name="name" required  value="" class="form-control">
                      </div>     
                  </div>
              </div>


              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Min Width</label>
                           <input type="text" name="width"   value="" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Min Height</label>
                           <input type="text" name="height"   value="" class="form-control">
                      </div>     
                  </div>
              </div>


              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Thumb Width</label>
                           <input type="text" name="thumb_width"   value="" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Thumb Height</label>
                           <input type="text" name="thumb_height"   value="" class="form-control">
                      </div>     
                  </div>
              </div>

              
             
    
              <div  class="row">
                  <div class="col-md-12">
                       <div class="form-group">
                          <label>Slider Group Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], null,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="CREATE" data-form="#create-sliders" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Save
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-form="#create-sliders">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         