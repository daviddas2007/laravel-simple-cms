<div class="box-header with-border">
	<h3 class="box-title">{{$menuDetail->name}} Menu</h3>
	<div class="box-tools pull-right">
	    <button type="button" class="btn btn-success btn-sm" data-action="NEW" data-load-to="#menu-entry" data-href="{{ URL::to('admin/menu/'.$menuDetail->slug.'/submenu/create') }}">
	    <i class="fa fa-plus-circle"></i> Sub Menu
	    </button>                     
	</div>
	</div>
	<form accept-charset="utf-8" class="form-vertical" id="create-menu" method="POST" action="{{ URL::to("admin/menu/update/$menuDetail->id") }}">
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
	        <div class="form-group required">
	          <label for="key" class="control-label">Key</label>
	          <input class="form-control" required="" placeholder="Enter Key" id="key" type="text" name="key" value="{{$menuDetail->key}}">
	        </div>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6 ">
	        <div class="form-group">
	          <label for="order" class="control-label">Menu Order</label>
	          <input class="form-control" placeholder="Enter Order" id="order" type="text" name="order" value="{{$menuDetail->order}}">
	        </div>
	    </div>
	    <div class="col-md-6">
	        <div class="form-group">
	          <label for="status" class="control-label">Status</label>
	          <select class="form-control" id="status" name="status">
	            <option value="" disabled="disabled" @if(empty($menuDetail->status)) selected="selected" @endif>Enter Status</option>
	            <option value="1" @if($menuDetail->status == 1) selected="selected" @endif>Show</option>
	            <option value="0" @if($menuDetail->status == 0) selected="selected" @endif>Hide</option>
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