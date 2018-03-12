@if ((count($item->children) > 0) AND ($item->parent_id > 0) AND ($item->status == 1))

    <li class="treeview">
    <a href="{{url($item->url)}}">
            <i class="{{ $item->icon }}"></i> <span>{{ $item->name }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>


@elseif ($item->status == 1)
    <li><a href="{{url($item->url)}}"><i class="{{ $item->icon }}"></i> <span>{{ $item->name }}</span></a>

    

@endif
    <ul class="treeview-menu">
    @if (count($item->children) > 0)

        @foreach($item->children as $item)

            @include('backend.menus.user.nesting', $item)

        @endforeach

    @endif
    </ul>
    </li>
