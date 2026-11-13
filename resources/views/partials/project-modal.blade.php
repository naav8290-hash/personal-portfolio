<dialog class="project-modal" id="project-dialog" aria-labelledby="project-dialog-title">
  <button class="modal-close" type="button" data-close-dialog aria-label="Tutup detail proyek">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
      <path d="M3 3l10 10M13 3 3 13" stroke="currentColor" stroke-width="1.4"/>
    </svg>
  </button>
  <div class="modal-panel">
    <div class="modal-media">
      <img id="project-dialog-image" alt="">
    </div>
    <div class="modal-body">
      <p class="modal-meta" id="project-dialog-meta"></p>
      <h2 class="modal-title" id="project-dialog-title"></h2>
      <p class="modal-desc" id="project-dialog-desc"></p>

      <div class="modal-section">
        <h3>Tujuan</h3>
        <p id="project-dialog-objective"></p>
      </div>

      <div class="modal-section">
        <h3>Fitur Utama</h3>
        <ul class="modal-features" id="project-dialog-features"></ul>
      </div>

      <div class="modal-section" id="project-dialog-tech-section">
        <h3>Teknologi</h3>
        <ul class="modal-tech" id="project-dialog-tech"></ul>
      </div>

      <div class="modal-actions" id="project-dialog-links" hidden></div>
      <p class="modal-note" id="project-dialog-note"></p>
    </div>
  </div>
</dialog>
