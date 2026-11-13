<section class="section skills" id="skills" data-section aria-labelledby="skills-title">
  <div class="container">
    <header class="section-head" data-reveal>
      <span class="section-numeral" aria-hidden="true">03</span>
      <p class="section-kicker">Keahlian</p>
      <h2 class="section-title" id="skills-title">Things I Can<br><em>Work With.</em></h2>
      <p class="section-intro">
        Beberapa alat dan teknologi yang pernah saya gunakan selama belajar dan
        mengerjakan latihan.
      </p>
    </header>

    <div class="skills-list">
      @foreach ($skills as $skill)
        <article class="skill-row" data-reveal>
          <span class="skill-num" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
          <h3>{{ $skill['title'] }}</h3>
          <ul class="skill-items">
            @foreach ($skill['items'] as $item)
              <li class="skill"><span class="skill-icon {{ $item['icon'] }}" aria-hidden="true"></span>{{ $item['name'] }}</li>
            @endforeach
          </ul>
        </article>
      @endforeach
    </div>
  </div>
</section>
