<div class="box">
   <form accept-charset="utf-8" class="form-vertical" id="create-pages" method="POST" action="{{ URL::to('admin/pages/insert')}}">
         {{ csrf_field() }}
         <div class="box-header">
            <h3 class="box-title">Add Page</h3>
          </div>
          <div class="box-body">
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group required">
                          <label>Page Title</label>
                           <input type="text" name="title" required  value="" class="form-control">
                      </div>     
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea id="content"  name="content" data-upload='{{ URL::to("admin/pages/upload")}}' required  class="html-editor"></textarea>
                      </div>
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Meta Title</label>
                           <input type="text" name="meta_title" value="" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Page Heading</label>
                           <input type="text" name="heading" value="" class="form-control">
                      </div>   
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Meta keyword</label>
                           <textarea name="meta_keyword"  class="form-control"></textarea>
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Meta Description</label>
                           <textarea name="meta_description" class="form-control"></textarea>
                      </div>   
                  </div>
              </div>
              <div  class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Page Order</label>
                           <input type="text" name="order" value="" class="form-control">
                      </div>     
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label>Page Status</label>
                          {{ Form::select('status', ['activate'=>'activate', 'deactivate'=>'deactivate'], null,['class'=>'form-control']) }}
                      </div>   
                  </div>
              </div>

              
          </div>
          <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm" data-action="CREATE" data-form="#create-pages" data-load-to="#response" data-datatable="#example1">
                <i class="fa fa-floppy-o"></i> Save
                </button>
                <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-form="#create-pages">
                <i class="fa fa-times-circle"></i> Cancel
                </button>
          </div>
      </form>   
</div>         