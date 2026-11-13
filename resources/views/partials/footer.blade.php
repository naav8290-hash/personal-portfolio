<footer class="site-footer">
  <div class="container footer-top">
    <div class="footer-brand">
      <span class="brand-mark" aria-hidden="true">VN</span>
      <div>
        <p class="footer-name">Vina Nuraini</p>
        <p class="footer-role">Pelajar Rekayasa Perangkat Lunak</p>
      </div>
    </div>

    <nav class="footer-social" aria-label="Tautan sosial">
      <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
      <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener noreferrer">Instagram</a>
      <a href="{{ $contact['github'] }}" target="_blank" rel="noopener noreferrer">GitHub</a>
    </nav>

    <a class="back-to-top" href="#home">
      Kembali ke atas
      <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
        <path d="M8 13V3M3.5 7.5 8 3l4.5 4.5" stroke="currentColor" stroke-width="1.4"/>
      </svg>
    </a>
  </div>

  <div class="container footer-colophon">
    <p>Situs pribadi — Laravel &amp; Blade</p>
    <p>Tipografi Manrope &amp; Playfair Display</p>
  </div>

  <div class="container footer-bottom">
    <p>Terima kasih telah berkunjung.</p>
    <p>© <span data-year>2026</span> Vina Nuraini. All rights reserved.</p>
  </div>
</footer>
