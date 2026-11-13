<header class="site-header" data-header>
  <div class="container nav-shell">
    <a class="brand" href="#home">
      <span class="brand-mark" aria-hidden="true">VN</span>
      <span class="brand-text">
        <span class="brand-name">Vina Nuraini</span>
        <span class="brand-sub">Portofolio</span>
      </span>
      <span class="sr-only">— Beranda</span>
    </a>

    <nav class="nav" aria-label="Navigasi utama">
      <ul class="nav-list">
        @foreach ($nav as $item)
          <li>
            <a
              class="nav-link {{ $loop->first ? 'is-active' : '' }}"
              href="#{{ $item['id'] }}"
              @if ($loop->first) aria-current="location" @endif
            >
              <span class="nav-num" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
              <span class="nav-label">{{ $item['label'] }}</span>
            </a>
          </li>
        @endforeach
      </ul>
    </nav>

    <button class="menu-toggle" type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu">
      <span class="menu-toggle-text" data-menu-label>Menu</span>
      <span class="menu-toggle-icon" aria-hidden="true"><span></span><span></span></span>
    </button>
  </div>
  <span class="nav-progress" data-nav-progress aria-hidden="true"></span>
</header>
