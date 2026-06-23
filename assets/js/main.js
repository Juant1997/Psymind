document.addEventListener("DOMContentLoaded", () => {
  initializePage();
});

async function initializePage() {
  await loadSharedComponents();
  setupCurrentYear();
  setupRevealAnimations();
  setupNavbarBehavior();
  setupContactForm();
  setupCounters();
}

async function loadSharedComponents() {
  const placeholders = Array.from(document.querySelectorAll("[data-component]"));
  if (placeholders.length === 0) {
    return;
  }

  await Promise.all(
    placeholders.map(async (placeholder) => {
      const componentName = placeholder.dataset.component;
      const basePath = placeholder.dataset.base || "./";
      if (!componentName) {
        return;
      }

      try {
        const response = await fetch(`${basePath}components/${componentName}.html`);
        if (!response.ok) {
          throw new Error(`No se pudo cargar ${componentName}`);
        }

        const template = document.createElement("template");
        template.innerHTML = (await response.text()).trim();
        const rootElement = template.content.firstElementChild;
        if (!rootElement) {
          return;
        }

        fillComponentFields(rootElement, placeholder.dataset);
        rewriteComponentPaths(rootElement, basePath);
        placeholder.replaceWith(rootElement);

        if (componentName === "header") {
          applyActiveNavigation(rootElement, placeholder.dataset.active || "");
        }
      } catch (error) {
        console.error(error);
      }
    }),
  );
}

function fillComponentFields(rootElement, dataset) {
  rootElement.querySelectorAll("[data-field]").forEach((fieldElement) => {
    const fieldName = fieldElement.getAttribute("data-field");
    if (!fieldName) {
      return;
    }

    const dataKey = `field${fieldName.charAt(0).toUpperCase()}${fieldName.slice(1)}`;
    const value = dataset[dataKey];
    if (typeof value === "undefined") {
      return;
    }

    if (fieldElement.tagName === "IMG") {
      fieldElement.setAttribute("src", value);
      const altValue = dataset.fieldAlt;
      if (typeof altValue !== "undefined") {
        fieldElement.setAttribute("alt", altValue);
      }
      if (!value) {
        fieldElement.remove();
      }
      return;
    }

    if (fieldName === "icon" || fieldName === "badge" || fieldName === "date") {
      fieldElement.innerHTML = value;
      return;
    }

    if (fieldName === "link") {
      fieldElement.setAttribute("href", value);
      return;
    }

    if (fieldName === "wrapper") {
      return;
    }

    if (fieldName === "linkText") {
      fieldElement.textContent = value;
      return;
    }

    fieldElement.textContent = value;
  });
}

function rewriteComponentPaths(rootElement, basePath) {
  const attributes = ["href", "src", "action", "poster"];
  rootElement.querySelectorAll("[href], [src], [action], [poster]").forEach((element) => {
    attributes.forEach((attributeName) => {
      const value = element.getAttribute(attributeName);
      if (!value || isNonRelativeUrl(value)) {
        return;
      }

      element.setAttribute(attributeName, `${basePath}${value}`);
    });
  });
}

function isNonRelativeUrl(value) {
  return /^(?:[a-z][a-z\d+.-]*:|\/\/|#)/i.test(value) || value.startsWith("/");
}

function applyActiveNavigation(headerElement, activeTarget) {
  const currentPath = window.location.pathname.replace(/\/+$|^$/, "/");
  const normalizedTarget = (activeTarget || currentPath).replace(/^\.\//, "").replace(/^\.\.\//, "");
  headerElement.querySelectorAll(".navbar .nav-link").forEach((link) => {
    const href = (link.getAttribute("href") || "").replace(/^\.\//, "").replace(/^\.\.\//, "");
    const isActive = href === normalizedTarget || href.endsWith(normalizedTarget) || (currentPath === "/" && href.endsWith("index.html"));

    link.classList.toggle("active", isActive);
    if (isActive) {
      link.setAttribute("aria-current", "page");
    } else {
      link.removeAttribute("aria-current");
    }
  });
}

function setupCurrentYear() {
  const yearElement = document.querySelector("[data-current-year]");
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  }
}

function setupRevealAnimations() {
  const revealElements = document.querySelectorAll(".reveal");
  if (revealElements.length === 0) {
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.16,
    },
  );

  revealElements.forEach((element) => observer.observe(element));
}

function setupNavbarBehavior() {
  const navCollapse = document.querySelector(".navbar-collapse");
  const navLinks = document.querySelectorAll(".navbar .nav-link");

  if (navCollapse) {
    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        if (window.innerWidth < 992 && navCollapse.classList.contains("show")) {
          const bootstrapCollapse = window.bootstrap?.Collapse.getInstance(navCollapse);
          bootstrapCollapse?.hide();
        }
      });
    });
  }

  const navElement = document.querySelector(".navbar");
  if (navElement) {
    const updateShadow = () => {
      navElement.classList.toggle("shadow-lg", window.scrollY > 8);
    };

    updateShadow();
    window.addEventListener("scroll", updateShadow, { passive: true });
  }
}

function setupContactForm() {
  const forms = document.querySelectorAll(".needs-validation");
  forms.forEach((form) => {
    form.addEventListener("submit", async (event) => {
      event.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }

      const messageBox = document.getElementById("form-message");
      if (messageBox) {
        messageBox.innerHTML = `
          <div class="alert alert-info">
            Enviando mensaje...
          </div>
        `;
      }

      try {
        const formData = new FormData(form);
        const response = await fetch("https://formspree.io/f/xjgzqggn", {
          method: "POST",
          body: formData,
          headers: {
            Accept: "application/json",
          },
        });

        if (response.ok) {
          if (messageBox) {
            messageBox.innerHTML = `
              <div class="alert alert-success">
                ¡Gracias! Tu mensaje fue enviado correctamente.
              </div>
            `;
          }
          form.reset();
          form.classList.remove("was-validated");
        } else {
          const errorData = await response.json();
          if (messageBox) {
            messageBox.innerHTML = `
              <div class="alert alert-danger">
                Error: ${errorData.error || "No se pudo enviar tu mensaje"}
              </div>
            `;
          }
        }
      } catch (error) {
        console.error("Error :", error);
        if (messageBox) {
          messageBox.innerHTML = `
            <div class="alert alert-danger">
              No se pudo conectar con el servidor.
            </div>
          `;
        }
      }
    });
  });
}

function setupCounters() {
  const stats = document.querySelectorAll("[data-count]");
  stats.forEach((stat) => {
    const targetValue = Number(stat.getAttribute("data-count") || "0");
    let currentValue = 0;
    const step = Math.max(1, Math.ceil(targetValue / 60));

    const tick = () => {
      currentValue += step;
      if (currentValue >= targetValue) {
        stat.textContent = `${targetValue}+`;
        return;
      }

      stat.textContent = `${currentValue}+`;
      window.requestAnimationFrame(tick);
    };

    const countObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          tick();
          countObserver.disconnect();
        }
      },
      { threshold: 0.4 },
    );
    countObserver.observe(stat);
  });
}
