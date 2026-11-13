/* =========================================================
   Vina Nuraini — Site interactions
   ========================================================= */
(function initSite() {
  const header = document.querySelector("[data-header]");
  const menuToggle = document.querySelector("[data-menu-toggle]");
  const mobileMenu = document.querySelector("[data-mobile-menu]");
  const menuLabel = document.querySelector("[data-menu-label]");
  const navLinks = Array.from(document.querySelectorAll(".nav-link"));
  const mobileLinks = Array.from(document.querySelectorAll("[data-mobile-link]"));
  const sections = Array.from(document.querySelectorAll("[data-section]"));
  const navProgress = document.querySelector("[data-nav-progress]");

  /* Header state -------------------------------------------------- */
  function updateHeaderState() {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 24);
  }

  updateHeaderState();
  window.addEventListener("scroll", updateHeaderState, { passive: true });

  /* Active section indicator -------------------------------------- */
  function setActiveSection(id) {
    navLinks.forEach((link) => {
      const isActive = link.getAttribute("href") === `#${id}`;
      link.classList.toggle("is-active", isActive);
      if (isActive) {
        link.setAttribute("aria-current", "location");
      } else {
        link.removeAttribute("aria-current");
      }
    });

    mobileLinks.forEach((link) => {
      link.classList.toggle("is-active", link.getAttribute("href") === `#${id}`);
    });
  }

  function updateActiveSection() {
    const offset = (header ? header.offsetHeight : 72) + 90;
    let currentId = sections.length ? sections[0].id : "home";

    sections.forEach((section) => {
      if (section.getBoundingClientRect().top <= offset) {
        currentId = section.id;
      }
    });

    setActiveSection(currentId);
  }

  function updateNavProgress() {
    if (!navProgress) return;
    const scrollable = document.documentElement.scrollHeight - window.innerHeight;
    const progress = scrollable > 0 ? Math.min(window.scrollY / scrollable, 1) : 0;
    navProgress.style.transform = `scaleX(${progress.toFixed(4)})`;
  }

  let scrollQueued = false;
  function onScroll() {
    if (scrollQueued) return;
    scrollQueued = true;
    window.requestAnimationFrame(() => {
      updateActiveSection();
      updateNavProgress();
      scrollQueued = false;
    });
  }

  updateActiveSection();
  updateNavProgress();
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", () => {
    updateActiveSection();
    updateNavProgress();
  });

  /* Mobile menu --------------------------------------------------- */
  function menuFocusables() {
    return [menuToggle, ...mobileMenu.querySelectorAll("a[href], button")].filter(Boolean);
  }

  function openMenu() {
    document.body.classList.add("menu-open");
    menuToggle.setAttribute("aria-expanded", "true");
    mobileMenu.removeAttribute("inert");
    mobileMenu.setAttribute("aria-hidden", "false");
    if (menuLabel) menuLabel.textContent = "Tutup";
    const firstLink = mobileMenu.querySelector("a[href]");
    if (firstLink) window.setTimeout(() => firstLink.focus(), 80);
  }

  function closeMenu(restoreFocus = true) {
    const wasOpen = document.body.classList.contains("menu-open");
    document.body.classList.remove("menu-open");
    if (menuToggle) {
      menuToggle.setAttribute("aria-expanded", "false");
      if (restoreFocus && wasOpen) menuToggle.focus();
    }
    mobileMenu.setAttribute("aria-hidden", "true");
    mobileMenu.setAttribute("inert", "");
    if (menuLabel) menuLabel.textContent = "Menu";
  }

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
      if (document.body.classList.contains("menu-open")) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    mobileLinks.forEach((link) => {
      link.addEventListener("click", () => closeMenu(false));
    });

    document.addEventListener("keydown", (event) => {
      if (!document.body.classList.contains("menu-open")) return;

      if (event.key === "Escape") {
        event.preventDefault();
        closeMenu();
        return;
      }

      if (event.key !== "Tab") return;
      const focusable = menuFocusables();
      if (!focusable.length) return;
      const first = focusable[0];
      const last = focusable[focusable.length - 1];

      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 900 && document.body.classList.contains("menu-open")) {
        closeMenu(false);
      }
    });
  }

  /* Scroll reveal -------------------------------------------------- */
  const revealItems = Array.from(document.querySelectorAll("[data-reveal]"));

  if ("IntersectionObserver" in window) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -6% 0px" }
    );

    revealItems.forEach((item) => revealObserver.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add("is-visible"));
  }

  /* Contact form --------------------------------------------------- */
  const form = document.querySelector("[data-contact-form]");

  if (form) {
    const status = form.querySelector("[data-form-status]");
    const submitButton = form.querySelector("[data-submit-button]");
    const submitLabel = form.querySelector("[data-submit-label]");
    const whatsappLink = document.querySelector('.contact-list a[href^="https://wa.me/"]');
    const whatsappBase = whatsappLink
      ? whatsappLink.getAttribute("href")
      : "";

    const fields = {
      name: {
        input: form.querySelector("#contact-name"),
        error: form.querySelector("#name-error"),
        validate(value) {
          if (!value) return "Silakan masukkan nama Anda.";
          if (value.length < 2) return "Gunakan minimal 2 karakter.";
          return "";
        }
      },
      email: {
        input: form.querySelector("#contact-email"),
        error: form.querySelector("#email-error"),
        validate(value) {
          if (!value) return "Silakan masukkan alamat email Anda.";
          if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            return "Silakan masukkan alamat email yang valid.";
          }
          return "";
        }
      },
      subject: {
        input: form.querySelector("#contact-subject"),
        error: form.querySelector("#subject-error"),
        validate(value) {
          if (!value) return "Silakan isi subjek.";
          if (value.length < 3) return "Gunakan minimal 3 karakter.";
          return "";
        }
      },
      message: {
        input: form.querySelector("#contact-message"),
        error: form.querySelector("#message-error"),
        validate(value) {
          if (!value) return "Silakan tulis pesan.";
          if (value.length < 10) return "Silakan tulis minimal 10 karakter.";
          return "";
        }
      }
    };

    Object.values(fields).forEach((field) => {
      if (!field.input) return;
      field.input.addEventListener("input", () => {
        if (field.input.getAttribute("aria-invalid") === "true") {
          field.input.removeAttribute("aria-invalid");
          field.error.textContent = "";
          field.error.classList.remove("is-visible");
        }
      });
    });

    form.addEventListener("submit", (event) => {
      event.preventDefault();
      if (status) {
        status.classList.remove("is-visible");
        status.textContent = "";
      }

      let firstInvalid = null;

      Object.values(fields).forEach((field) => {
        if (!field.input) return;
        const message = field.validate(field.input.value.trim());
        if (message) {
          field.input.setAttribute("aria-invalid", "true");
          field.error.textContent = message;
          field.error.classList.add("is-visible");
          if (!firstInvalid) firstInvalid = field.input;
        } else {
          field.input.removeAttribute("aria-invalid");
          field.error.textContent = "";
          field.error.classList.remove("is-visible");
        }
      });

      if (firstInvalid) {
        firstInvalid.focus();
        return;
      }

      const name = fields.name.input.value.trim();
      const email = fields.email.input.value.trim();
      const subject = fields.subject.input.value.trim();
      const message = fields.message.input.value.trim();

      const body = `Halo, saya ${name} (${email}).\n\nSubjek: ${subject}\n\n${message}`;
      const whatsappUrl = `${whatsappBase}?text=${encodeURIComponent(body)}`;

      if (submitLabel) submitLabel.textContent = "Membuka WhatsApp…";
      if (submitButton) submitButton.disabled = true;

      window.open(whatsappUrl, "_blank", "noopener,noreferrer");

      if (status) {
        status.textContent =
          "WhatsApp seharusnya terbuka di tab baru dengan pesan yang sudah disiapkan. Tidak ada pesan yang terkirim otomatis.";
        status.classList.add("is-visible");
      }

      window.setTimeout(() => {
        if (submitLabel) submitLabel.textContent = "Kirim Pesan";
        if (submitButton) submitButton.disabled = false;
      }, 2000);
    });
  }

  /* Footer year ---------------------------------------------------- */
  const year = document.querySelector("[data-year]");
  if (year) year.textContent = String(new Date().getFullYear());
})();
