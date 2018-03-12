<div class="box">
   <form accept-charset="utf-8" enctype="multipart/form-data" class="form-vertical" id="create-sliders" method="POST" action='{{ URL::to("admin/sliders/update/{$list->id}")}}'>
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Edit Slider</h3>
            <div class="box-tools pull-right">
                  <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#response" data-href="{{URL::to('admin/sliders/create')}}">
                  <i class="fa fa-plus-circle"></i> Create Slider
                  </button>                     
            </div>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Slider Title</label>
                           <input type="text" name="title" required  value="{{$list->title}}" class="form-control">
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Slider Url</label>
                           <input type="text" name="url"  value="{{$list->url}}" class="form-control">
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Slider Group</label>
                           {!! Form::select('group_id',[''=>'Please select'] + $groups,$list->group_id,array('class'=>'form-control','required'=>'true')) !!}
                      </div>     
                  </div>
              </div>

              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Slider Image</label>
                           @if($list->image)
                           <div class="thumbnail">
                           <img src="{{Url::to('public/uploads/sliders/'.$list->image)}}"   alt="Cinque Terre" width="200" height="150">
                           </div>
                           @endif
                           <input type="file" name="file"  class="form-control">
                      </div>     
                  </div>
              </div>


              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Short Description</label>
                          <textarea id="description" class="form-control"  name="description">{{$list->description}}</textarea>
                      </div>     
                  </div>
              </div>
             
    
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Slider Order</label>
                           <input type="text" name="order" value="{{$list->order}}" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Slider Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], $list->status,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="UPDATE" data-form="#create-sliders" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Update
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="EDIT" data-load-to="#response" data-form="#create-sliders" data-href="{{URL::to('admin/sliders/edit/'.$list->id)}}">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         