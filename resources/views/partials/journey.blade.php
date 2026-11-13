<section class="section journey" id="journey" data-section aria-labelledby="journey-title">
  <div class="container">
    <header class="section-head" data-reveal>
      <span class="section-numeral" aria-hidden="true">02</span>
      <p class="section-kicker">Belajar</p>
      <h2 class="section-title" id="journey-title">My Learning<br><em>Journey.</em></h2>
      <p class="section-intro">
        Proses belajar yang saya jalani sejauh ini, dari dasar pemrograman hingga
        eksplorasi desain dan multimedia.
      </p>
    </header>

    <ol class="journey-list">
      @foreach ($journey as $step)
        <li class="journey-item" data-reveal>
          <span class="journey-num" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
          <p class="journey-period">{{ $step['period'] }}</p>
          <div class="journey-body">
            <h3>{{ $step['title'] }}</h3>
            <p>{{ $step['description'] }}</p>
          </div>
        </li>
      @endforeach
    </ol>

    @if (filled($journeyNote))
      <p class="journey-note">{{ $journeyNote }}</p>
    @endif
  </div>
</section>
