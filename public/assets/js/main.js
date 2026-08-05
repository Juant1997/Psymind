document.addEventListener("DOMContentLoaded", () => {
  initializePage();
});

function initializePage() {
  setupRevealAnimations();
  setupNavbarBehavior();
  setupContactForm();
  setupCounters();
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
    { threshold: 0.16 },
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