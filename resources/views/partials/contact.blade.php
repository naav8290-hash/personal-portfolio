<section class="section contact" id="contact" data-section aria-labelledby="contact-title">
  <div class="container">
    <header class="section-head" data-reveal>
      <span class="section-numeral" aria-hidden="true">05</span>
      <p class="section-kicker">Kontak</p>
      <h2 class="section-title" id="contact-title">Let's Get<br><em>in Touch!</em></h2>
      <p class="section-intro">
        Jika ada pertanyaan, ingin berdiskusi, atau tertarik pada bidang yang saya
        pelajari, silakan menghubungi saya melalui kanal di bawah ini.
      </p>
    </header>

    <div class="contact-grid">
      <div class="contact-info" data-reveal>
        <p class="contact-lead">
          Anda dapat mengisi formulir atau menghubungi saya langsung melalui salah satu kanal berikut.
        </p>
        <ul class="contact-list">
          <li>
            <a href="tel:{{ $contact['phone'] }}">
              <span class="contact-num" aria-hidden="true">01</span>
              <span class="contact-id">
                <span class="contact-icon icon-phone" aria-hidden="true"></span>
                <span class="contact-label">Telepon</span>
              </span>
              <span class="contact-value">{{ $contact['phone_display'] }}
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M2 8h11M9 3.5 13.5 8 9 12.5" stroke="currentColor" stroke-width="1.3"/>
                </svg>
              </span>
            </a>
          </li>
          <li>
            <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer">
              <span class="contact-num" aria-hidden="true">02</span>
              <span class="contact-id">
                <span class="contact-icon icon-whatsapp" aria-hidden="true"></span>
                <span class="contact-label">WhatsApp</span>
              </span>
              <span class="contact-value">{{ $contact['phone_display'] }}
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>
                </svg>
                <span class="sr-only">(buka di tab baru)</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener noreferrer">
              <span class="contact-num" aria-hidden="true">03</span>
              <span class="contact-id">
                <span class="contact-icon icon-instagram" aria-hidden="true"></span>
                <span class="contact-label">Instagram</span>
              </span>
              <span class="contact-value">{{ $contact['instagram_handle'] }}
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>
                </svg>
                <span class="sr-only">(buka di tab baru)</span>
              </span>
            </a>
          </li>
          <li>
            <a href="{{ $contact['github'] }}" target="_blank" rel="noopener noreferrer">
              <span class="contact-num" aria-hidden="true">04</span>
              <span class="contact-id">
                <span class="contact-icon icon-github" aria-hidden="true"></span>
                <span class="contact-label">GitHub</span>
              </span>
              <span class="contact-value">{{ $contact['github_handle'] }}
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>
                </svg>
                <span class="sr-only">(buka di tab baru)</span>
              </span>
            </a>
          </li>
        </ul>
        @if (! empty($contact['placeholder']) && filled($contact['note'] ?? null))
          <p class="contact-note">{{ $contact['note'] }}</p>
        @endif
      </div>

      <form class="contact-form" data-contact-form novalidate data-reveal style="--reveal-delay: 0.08s">
        <p class="form-kicker">Formulir Pesan</p>
        <div class="form-row">
          <div class="field">
            <label for="contact-name">Nama <span class="req" aria-hidden="true">*</span></label>
            <input type="text" id="contact-name" name="name" autocomplete="name" required aria-describedby="name-error" placeholder="Nama lengkap">
            <p class="field-error" id="name-error"></p>
          </div>
          <div class="field">
            <label for="contact-email">Email <span class="req" aria-hidden="true">*</span></label>
            <input type="email" id="contact-email" name="email" autocomplete="email" inputmode="email" required aria-describedby="email-error" placeholder="nama@email.com">
            <p class="field-error" id="email-error"></p>
          </div>
        </div>

        <div class="field">
          <label for="contact-subject">Subjek <span class="req" aria-hidden="true">*</span></label>
          <input type="text" id="contact-subject" name="subject" required aria-describedby="subject-error" placeholder="Tulis subjek pesan">
          <p class="field-error" id="subject-error"></p>
        </div>

        <div class="field">
          <label for="contact-message">Pesan <span class="req" aria-hidden="true">*</span></label>
          <textarea id="contact-message" name="message" rows="5" required aria-describedby="message-error" placeholder="Tulis pesan Anda"></textarea>
          <p class="field-error" id="message-error"></p>
        </div>

        <button class="btn btn-dark form-submit" type="submit" data-submit-button>
          <span data-submit-label>Kirim Pesan</span>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M2 8h11M9 3.5 13.5 8 9 12.5" stroke="currentColor" stroke-width="1.4"/>
          </svg>
        </button>

        <p class="form-status" data-form-status role="status" aria-live="polite"></p>
        <p class="form-note">
          Formulir ini hanya menyiapkan pesan dan membukanya di WhatsApp; pesan tidak terkirim
          secara otomatis. Anda juga dapat menghubungi saya langsung melalui
          <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>.
        </p>
        <noscript>
          <p class="form-note form-note--noscript">
            JavaScript tidak aktif. Silakan gunakan tautan WhatsApp di atas untuk menghubungi saya.
          </p>
        </noscript>
      </form>
    </div>
  </div>
</section>
