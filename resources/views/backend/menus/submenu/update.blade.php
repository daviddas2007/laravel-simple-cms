<div class="box-header with-border">
    <h3 class="box-title">Update Sub Menu ({{$ansestor[0]->name}} Menu)</h3>
    <div class="box-tools pull-right">

          <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#menu-entry" data-href="{{ URL::to('admin/menu/'.$ansestor[0]->slug.'/submenu/create') }}">
          <i class="fa fa-plus-circle"></i> Sub Menu
          </button>                     
     </div>
</div>


<form accept-charset="utf-8" class="form-vertical" id="create-menu" method="POST"  files="true" enctype="multipart/form-data" action="{{ URL::to('admin/menu/'.$ansestor[0]->key.'/submenu/update/'.$menuDetail->id) }}">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group required">
                <label for="name" class="control-label">Name</label>
                <input class="form-control" required="" placeholder="Enter Name" id="name" type="text" name="name" value="{{$menuDetail->name}}">
              </div>
          </div>
          <div class="col-md-6 ">
              <div class="form-group">
                 <label for="url" class="control-label">Url</label>
                 <input class="form-control" placeholder="Enter url" id="url" type="text" name="url" value="{{$menuDetail->url}}">
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="status" class="control-label">Parent</label>
                <select class="form-control" id="parent_id" name="parent_id">
                  <option value="{{$ansestor[0]->id}}"  @if(empty($menuDetail->parent_id)) selected="selected" @endif>Enter Parent Menu</option>
                  @foreach($menuDrop as $drop)
                  @if($menuDetail->id !=  $drop['id'])
                  <option value="{{$drop['id']}}" @if($menuDetail->parent_id == $drop['id']) selected="selected" @endif>{{$drop['name']}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              
          </div>
          <div class="col-md-6">
              <div class="form-group">
                 <label for="icon" class="control-label">Icon</label>
                 <input class="form-control" placeholder="Enter Icon Class" id="icon" type="text" name="icon" value="{{$menuDetail->icon}}">
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="" disabled="disabled" @if(empty($menuDetail->status)) selected="selected" @endif>Enter Status</option>
                  <option value="1" @if($menuDetail->status == 1) selected="selected" @endif>Show</option>
                  <option value="0" @if($menuDetail->status == 0) selected="selected" @endif>Hide</option>
                </select>
              </div>
              
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="target" class="control-label">Open in</label>
                <select class="form-control" id="target" name="target">
                  <option value="" disabled="disabled" @if(empty($menuDetail->target)) selected="selected" @endif>Select open in</option>
                  <option value="_self"  @if($menuDetail->target == "_self") selected="selected" @endif>Same window</option>
                  <option value="_blank" @if($menuDetail->target == "_blank") selected="selected" @endif>New window</option>
                </select>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12 ">
              <div class="form-group">
                 <label for="description" class="control-label">Description</label>
                 <textarea class="form-control" placeholder="Enter Description" id="description" name="description">{{$menuDetail->description}}</textarea>
              </div>
          </div>
      </div>
 
      
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="button" class="btn btn-primary btn-sm" data-action="UPDATE" data-form="#create-menu" data-load-to="#menu-entry">
      <i class="fa fa-floppy-o"></i> Update
      </button>
      <button type="button" class="btn btn-default btn-sm" data-action="CANCEL" data-load-to="#menu-entry"><i class="fa fa-times-circle"></i> Cancel</button>
    </div>
</form>
