<div class="box-header with-border">
    <h3 class="box-title">Create Sub Menu ( {{$menuDetail->name}} Menu)</h3>
    <div class="box-tools pull-right">

          <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#menu-entry" data-href="{{ URL::to('admin/menu/'.$menuSlug.'/submenu/create') }}">
          <i class="fa fa-plus-circle"></i> Sub  Menu
          </button>                     
     </div>
</div>
<form accept-charset="utf-8" class="form-vertical" id="create-menu" method="POST" action="{{ URL::to('admin/menu/'.$menuSlug.'/submenu/insert') }}">
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
              <div class="form-group">
                 <label for="url" class="control-label">Url</label>
                 <input class="form-control" placeholder="Enter url" id="url" type="text" name="url" value="">
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="status" class="control-label">parent</label>
                <?php //echo "<pre>"; print_r($dropdown); ?>
                <select class="form-control" id="parent_id" name="parent_id">
                  <option value="{{$menuGroup}}"   selected="selected" >Enter Parent Menu</option>
                  @foreach($dropdown as $value)
                  <option value="{{$value['id']}}">{{$value['name']}}</option>
                  @endforeach
                </select>
              </div>
              
          </div>
          <div class="col-md-6">
              <div class="form-group">
                 <label for="icon" class="control-label">Icon</label>
                 <input class="form-control" placeholder="Enter Icon Class" id="icon" type="text" name="icon" value="">
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="" disabled="disabled" selected="selected">Enter Status</option>
                  <option value="1">Show</option>
                  <option value="0">Hide</option>
                </select>
              </div>
              
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="target" class="control-label">Open in</label>
                <select class="form-control" id="target" name="target">
                  <option value="" disabled="disabled" selected="selected">Select open in</option>
                  <option value="_self">Same window</option>
                  <option value="_blank">New window</option>
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
