@if ((count($item->children) > 0) AND ($item->parent_id > 0))

    <li class="dd-item dd3-item" data-id="{{$item->id}}"> 
          <button data-action="collapse" type="button">Collapse</button>
          <button data-action="expand" type="button" style="display: none;">Expand</button>
          <div class="dd-handle dd3-handle">Drag</div>
          <div class="dd3-content">
              <a href="#" data-action="LOAD" data-load-to="#menu-entry" data-href="{{url('admin/menu/submenu/'.$item->id)}}">
                  <i class="{{ $item->icon }}"></i> {{ $item->name }}
                  
              </a>
              <a href="javascript:void(0);" data-action="DELETE" data-load-to="#menu-entry" data-href="{{url('admin/menu/delete/'.$item->id)}}" class="pull-right">
                 <i class="glyphicon glyphicon-trash"></i>
              </a>
          </div>


@else

    <li class="dd-item dd3-item" data-id="{{$item->id}}">
        <button data-action="collapse" type="button">Collapse</button>
        <button data-action="expand" type="button" style="display: none;">Expand</button>
        <div class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content">
          <a href="#" data-action="LOAD" data-load-to="#menu-entry" data-href="{{url('admin/menu/submenu/'.$item->id)}}">
              <i class="{{ $item->icon }}"></i> {{ $item->name }}
              
          </a>
          <a href="javascript:void(0);" data-action="DELETE" data-load-to="#menu-entry" data-href="{{url('admin/menu/delete/'.$item->id)}}" class="pull-right">
             <i class="glyphicon glyphicon-trash"></i>
          </a>
        </div>

@endif
    <ol class="dd-list">
    @if (count($item->children) > 0)

        @foreach($item->children as $item)

            @include('backend.menus.nesting', $item)

        @endforeach

    @endif
    </ol>
    </li>
