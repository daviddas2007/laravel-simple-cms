<div class="box">
   <form class="form-vertical" enctype="multipart/form-data"  id="create-sliders" method="POST" action="{{ URL::to('admin/sliders/insert') }}">
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Add Slider</h3>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Slider Title</label>
                           <input type="text" name="title" required  value="" class="form-control">
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Slider Url</label>
                           <input type="text" name="url"  value="" class="form-control">
                      </div>     
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Slider Group</label>
                           {!! Form::select('group_id',[''=>'Please select'] + $groups,null,array('class'=>'form-control','required'=>'true')) !!}
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Slider Image</label>
                           <input type="file" name="file" required  class="form-control">
                      </div>     
                  </div>
              </div>


              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Short Description</label>
                          <textarea id="description" class="form-control"  name="description"></textarea>
                      </div>     
                  </div>
              </div>
             
    
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Order</label>
                           <input type="text" name="order" value="" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Slider Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], null,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="CREATE" data-form="#create-sliders" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Save
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="NEW" data-load-to="#response" data-href="{{URL::to('admin/sliders/create')}}">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         