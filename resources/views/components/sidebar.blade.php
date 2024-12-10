<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach (config('sidebar') as $item)
            @if (isset($item['submenu']))
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#{{ $item['name'] }}" aria-expanded="false" aria-controls="{{ $item['name'] }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">{{ $item['name'] }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="{{ $item['name'] }}">
                        <ul class="nav flex-column sub-menu">
                            @foreach ($item['submenu'] as $subitem)
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::route()->getName() == $subitem['route'] ? 'active' : '' }}" href="{{ route($subitem['route'], $subitem['route'] == 'editProfile' ? ['id' => auth()->user()->id] : []) }}">{{ $subitem['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == $item['route'] ? 'active' : '' }}" href="{{ route($item['route']) }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">{{ $item['name'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
