/* =========================================================
   Detail proyek — data berasal dari config/portfolio.php
   dan diberikan oleh Blade sebagai JSON. Kartu proyek sudah
   dirender server-side; skrip ini hanya mengatur dialog.
   ========================================================= */
(function initProjects() {
  const dataNode = document.getElementById("portfolio-projects");
  const grid = document.querySelector("[data-project-grid]");
  const dialog = document.getElementById("project-dialog");
  if (!dataNode || !grid || !dialog) return;

  let projects = [];
  try {
    projects = JSON.parse(dataNode.textContent);
  } catch (error) {
    return;
  }

  const dialogImage = document.getElementById("project-dialog-image");
  const dialogMeta = document.getElementById("project-dialog-meta");
  const dialogTitle = document.getElementById("project-dialog-title");
  const dialogDesc = document.getElementById("project-dialog-desc");
  const dialogObjective = document.getElementById("project-dialog-objective");
  const dialogFeatures = document.getElementById("project-dialog-features");
  const dialogTech = document.getElementById("project-dialog-tech");
  const dialogTechSection = document.getElementById("project-dialog-tech-section");
  const dialogLinks = document.getElementById("project-dialog-links");
  const dialogNote = document.getElementById("project-dialog-note");
  const closeButton = dialog.querySelector("[data-close-dialog]");
  let lastTrigger = null;

  const externalSvg =
    '<svg width="12" height="12" viewBox="0 0 16 16" fill="none" aria-hidden="true">' +
    '<path d="M4 12 12 4M6 4h6v6" stroke="currentColor" stroke-width="1.3"/>' +
    "</svg>";

  function element(tag, className, text) {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined) node.textContent = text;
    return node;
  }

  function openProject(project, trigger) {
    lastTrigger = trigger || null;

    dialogImage.src = project.image_webp || project.image;
    dialogImage.alt = project.imageAlt;
    dialogImage.decoding = "async";
    if (project.imageWidth && project.imageHeight) {
      dialogImage.width = project.imageWidth;
      dialogImage.height = project.imageHeight;
      dialog.style.setProperty("--media-ratio", project.imageWidth / project.imageHeight);
    } else {
      dialogImage.removeAttribute("width");
      dialogImage.removeAttribute("height");
      dialog.style.removeProperty("--media-ratio");
    }

    dialogMeta.replaceChildren(element("span", "", project.category));
    const dot = element("span", "dot");
    dot.setAttribute("aria-hidden", "true");
    dialogMeta.append(dot);
    if (project.placeholder) {
      dialogMeta.append(element("span", "placeholder-tag", "Contoh"));
    }

    dialogTitle.textContent = project.title;
    dialogDesc.textContent = project.description;
    dialogObjective.textContent = project.objective;

    dialogFeatures.replaceChildren();
    project.features.forEach((feature) => {
      dialogFeatures.append(element("li", "", feature));
    });

    dialogTech.replaceChildren();
    if (project.tech.length) {
      project.tech.forEach((item) => dialogTech.append(element("li", "", item)));
    }
    dialogTechSection.hidden = !project.tech.length;

    dialogLinks.replaceChildren();
    if (project.demo) {
      const demo = document.createElement("a");
      demo.className = "btn btn-dark";
      demo.href = project.demo;
      demo.target = "_blank";
      demo.rel = "noopener noreferrer";
      demo.append(document.createTextNode("Lihat Demo"));
      demo.insertAdjacentHTML("beforeend", externalSvg);
      dialogLinks.append(demo);
    }
    if (project.repo) {
      const repo = document.createElement("a");
      repo.className = "btn btn-outline-dark";
      repo.href = project.repo;
      repo.target = "_blank";
      repo.rel = "noopener noreferrer";
      repo.append(document.createTextNode("Lihat Repositori"));
      repo.insertAdjacentHTML("beforeend", externalSvg);
      dialogLinks.append(repo);
    }
    dialogLinks.hidden = !project.demo && !project.repo;

    dialogNote.textContent = project.note || "";
    dialogNote.hidden = !project.note;

    if (!dialog.open) dialog.showModal();
    document.body.classList.add("modal-open");
  }

  grid.addEventListener("click", (event) => {
    const trigger = event.target.closest("[data-open-project]");
    if (!trigger) return;
    const project = projects.find((item) => item.id === trigger.getAttribute("data-open-project"));
    if (project) openProject(project, trigger);
  });

  closeButton.addEventListener("click", () => dialog.close());

  dialog.addEventListener("click", (event) => {
    if (event.target === dialog) dialog.close();
  });

  dialog.addEventListener("close", () => {
    document.body.classList.remove("modal-open");
    if (lastTrigger && typeof lastTrigger.focus === "function") lastTrigger.focus();
    lastTrigger = null;
  });
})();
