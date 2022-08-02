<div class="nav">
    @foreach( $menus as $menu )
    <a class="nav-link" href="{{ $menu['route'] }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        {{ $menu['title'] }}
    </a>
    @endforeach
</div>