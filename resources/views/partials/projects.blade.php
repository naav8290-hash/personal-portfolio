<section class="section projects" id="projects" data-section data-theme="light" aria-labelledby="projects-title">
  <div class="container">
    <header class="section-head" data-reveal>
      <span class="section-numeral" aria-hidden="true">04</span>
      <p class="section-kicker">Proyek</p>
      <h2 class="section-title" id="projects-title">Project<br><em>Gallery.</em></h2>
      <p class="section-intro">
        Beberapa proyek dan kegiatan yang pernah saya kerjakan, dari pengembangan web
        hingga dokumentasi video.
      </p>
    </header>

    <div class="project-grid" data-project-grid>
      @foreach ($projects as $project)
        <article class="project-card {{ $loop->first ? 'project-card--featured' : '' }}" data-reveal style="--reveal-delay: {{ min(($loop->index) * 0.06, 0.18) }}s">
          <p class="project-plate" aria-hidden="true">
            <span class="project-plate-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
            <span class="project-plate-line"></span>
            <span>{{ $project['category'] }}</span>
          </p>

          <button
            type="button"
            class="project-media"
            data-open-project="{{ $project['id'] }}"
            aria-haspopup="dialog"
            aria-label="Lihat detail {{ $project['title'] }} — {{ $project['category'] }}"
            style="aspect-ratio: {{ $project['imageWidth'] ?? 1200 }} / {{ $project['imageHeight'] ?? 900 }}"
          >
            <img
              src="{{ $project['image_webp'] }}"
              @if ($project['image_srcset'])
                srcset="{{ $project['image_srcset'] }}"
                sizes="{{ $loop->first ? '(min-width: 1024px) 55vw, 100vw' : '(min-width: 1024px) 30vw, (min-width: 768px) 46vw, 100vw' }}"
              @endif
              alt="{{ $project['imageAlt'] }}"
              width="{{ $project['imageWidth'] ?? 1200 }}"
              height="{{ $project['imageHeight'] ?? 900 }}"
              loading="{{ $loop->first ? 'eager' : 'lazy' }}"
              decoding="async"
            >
            <span class="project-arrow" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 16 16" fill="none">
                <path d="M2 8h11M9 3.5 13.5 8 9 12.5" stroke="currentColor" stroke-width="1.4"/>
              </svg>
            </span>
          </button>

          <div class="project-body">
            @if ($project['placeholder'])
              <p class="project-meta"><span class="placeholder-tag">Contoh</span></p>
            @endif
            <h3 class="project-title">{{ $project['title'] }}</h3>
            <p class="project-desc">{{ $project['summary'] }}</p>

            @if (! empty($project['tech']))
              <ul class="project-tech" aria-label="Teknologi">
                @foreach ($project['tech'] as $tech)
                  <li>{{ $tech }}</li>
                @endforeach
              </ul>
            @endif

            <div class="project-actions">
              <button
                type="button"
                class="project-detail-btn"
                data-open-project="{{ $project['id'] }}"
                aria-haspopup="dialog"
              >
                Lihat Detail
                <svg width="18" height="18" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M2 8h11M9 3.5 13.5 8 9 12.5" stroke="currentColor" stroke-width="1.4"/>
                </svg>
              </button>

              @if ($project['repo'])
                <a class="project-ext" href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer">
                  GitHub
                  <svg width="12" height="12" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                    <path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>
                  </svg>
                </a>
              @endif

              @if ($project['demo'])
                <a class="project-ext" href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer">
                  Demo Langsung
                  <svg width="12" height="12" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                    <path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>
                  </svg>
                </a>
              @endif
            </div>
          </div>
        </article>
      @endforeach
    </div>

    <noscript>
      <p class="projects-noscript">Aktifkan JavaScript untuk membuka detail proyek.</p>
    </noscript>
  </div>
</section>

@push('scripts')
  <script type="application/json" id="portfolio-projects">@json($projects, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)</script>
@endpush
