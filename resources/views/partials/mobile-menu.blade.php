<div class="mobile-menu" id="mobile-menu" data-mobile-menu aria-hidden="true" inert>
  <nav class="mobile-nav container" aria-label="Navigasi seluler">
    <p class="mobile-nav-title" aria-hidden="true">Indeks</p>
    <ul>
      @foreach ($nav as $item)
        <li>
          <a
            href="#{{ $item['id'] }}"
            data-mobile-link
            class="{{ $loop->first ? 'is-active' : '' }}"
          ><span class="mobile-index" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><span class="mobile-label">{{ $item['label'] }}</span></a>
        </li>
      @endforeach
    </ul>
  </nav>
  <div class="mobile-menu-footer container">
    <a class="mobile-email" href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $contact['phone_display'] }}</a>
    <div class="mobile-socials">
      <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener noreferrer">Instagram</a>
      <a href="{{ $contact['github'] }}" target="_blank" rel="noopener noreferrer">GitHub</a>
    </div>
  </div>
</div>
