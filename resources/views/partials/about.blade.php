<section class="section about" id="about" data-section data-theme="light" aria-labelledby="about-title">
  <div class="container">
    <header class="section-head" data-reveal>
      <span class="section-numeral" aria-hidden="true">01</span>
      <p class="section-kicker">Tentang</p>
      <h2 class="section-title" id="about-title">Tentang<br><em>saya.</em></h2>
      <p class="section-intro">
        Ringkasan singkat tentang latar pendidikan, minat, dan kemampuan yang sedang saya kembangkan.
      </p>
    </header>

    <div class="about-grid">
      <figure class="about-media" data-reveal>
        <div class="media-frame">
          <img
            src="{{ asset('assets/img/vina-900.webp') }}"
            srcset="{{ asset('assets/img/vina-480.webp') }} 480w, {{ asset('assets/img/vina-900.webp') }} 900w"
            sizes="(min-width: 1024px) 40vw, 100vw"
            alt="Potret Vina Nuraini"
            width="900"
            height="1125"
            loading="lazy"
            decoding="async"
          >
          <span class="media-tag" aria-hidden="true">Plat 01</span>
        </div>
        <figcaption>
          <span>Vina Nuraini</span>
        </figcaption>
      </figure>

      <div class="about-copy" data-reveal style="--reveal-delay: 0.08s">
        <p class="about-lead">Saya Vina Nuraini, pelajar Rekayasa Perangkat Lunak (RPL) di SMKN 3 Banjar.</p>

        <div class="about-body">
          <p>
            Saya mulai mengenal pemrograman melalui pelajaran di sekolah. Sejak itu, saya
            tertarik mempelajari cara kerja website dan mencoba membangun tampilan yang
            sederhana serta mudah digunakan.
          </p>
          <p>
            Selain pengembangan web, saya memiliki ketertarikan pada desain dan multimedia.
            Saya pernah menggunakan Figma dan Canva untuk membuat rancangan visual, serta
            CapCut untuk menyunting video sederhana.
          </p>
          <p>
            Saat ini saya terus mengembangkan kemampuan melalui latihan dan proyek kecil.
            Saya terbuka untuk mempelajari hal baru dan memperbaiki cara kerja saya.
          </p>
        </div>

        <blockquote class="pullquote">
          Fokus saya saat ini adalah belajar secara bertahap dan memperbaiki hasil kerja.
        </blockquote>

        <div class="about-facts">
          <div class="fact">
            <span class="fact-num" aria-hidden="true">01</span>
            <p class="fact-label">Pendidikan</p>
            <p class="fact-title">SMKN 3 Banjar</p>
            <p class="fact-detail">Rekayasa Perangkat Lunak (RPL)<br>Sekolah Menengah Kejuruan</p>
          </div>
          <div class="fact">
            <span class="fact-num" aria-hidden="true">02</span>
            <p class="fact-label">Minat</p>
            <ul class="fact-list">
              <li>Pengembangan Web</li>
              <li>Desain Antarmuka</li>
              <li>Multimedia</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
