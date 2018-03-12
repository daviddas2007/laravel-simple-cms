<div class="box">
   <form accept-charset="utf-8" class="form-vertical" id="create-pages" method="POST" action='{{ URL::to("admin/pages/update/{$list->id}")}}'>
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Edit Page</h3>
            <div class="box-tools pull-right">
                  <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#response" data-href="{{URL::to('admin/pages/create')}}">
                  <i class="fa fa-plus-circle"></i> Create Page
                  </button>                     
            </div>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Page Title</label>
                          <input type="text" name="title" value="{{$list->title}}" required  class="form-control">
                          <p>{{url::to($list->slug)}} <a target="_blank" href="{{url::to($list->slug)}}">    view</a></p>
                      </div>     
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea id="content" data-upload='{{ URL::to("admin/pages/upload")}}' required  name="content"  class="html-editor">{{$list->content}}</textarea>
                      </div>
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Meta Title</label>
                           <input type="text" name="meta_title" value="{{$list->meta_title}}" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Page Heading</label>
                           <input type="text" name="heading" value="{{$list->heading}}" class="form-control">
                      </div>   
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Meta keyword</label>
                           <textarea name="meta_keyword"  class="form-control">{{$list->meta_keyword}}</textarea>
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Meta Description</label>
                           <textarea name="meta_description" class="form-control">{{$list->meta_description}}</textarea>
                      </div>   
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Page Order</label>
                           <input type="text" name="order" value="{{$list->order}}" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Page Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], $list->status,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="UPDATE" data-form="#create-pages" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Update
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-form="#create-pages">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         