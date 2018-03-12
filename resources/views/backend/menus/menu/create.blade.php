<div id="menu-entry">
  <div class="box-header with-border">
    <h3 class="box-title">Create Menu</h3>
  </div>
  <form accept-charset="utf-8" class="form-vertical" id="create-menu" method="POST" action="{{ URL::to('admin/menu/insert') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="box-body">
      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group required">
                <label for="name" class="control-label">Name</label>
                <input class="form-control" required="" placeholder="Enter Name" id="name" type="text" name="name" value="">
              </div>
          </div>
          <div class="col-md-6 ">
              <div class="form-group required">
                <label for="key" class="control-label">Key</label>
                <input class="form-control" required="" placeholder="Enter Key" id="key" type="text" name="key" value="">
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="order" class="control-label">Menu Order</label>
                <input class="form-control" placeholder="Enter Order" id="order" type="text" name="order" value="">
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="" disabled="disabled" selected="selected">Enter Status</option>
                  <option value="1">Show</option>
                  <option value="0">Hide</option>
                </select>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12 ">
              <div class="form-group">
                 <label for="description" class="control-label">Description</label>
                 <textarea class="form-control" placeholder="Enter Description" id="description" name="description"></textarea>
              </div>
          </div>
      </div>
 
      
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="button" class="btn btn-primary btn-sm" data-action="CREATE" data-form="#create-menu" data-load-to="#menu-entry">
      <i class="fa fa-floppy-o"></i> Save
      </button>
      <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-load-to="#menu-entry"><i class="fa fa-times-circle"></i> Cancel</button>
    </div>
  </form>
</div>