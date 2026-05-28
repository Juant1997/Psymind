document.addEventListener("DOMContentLoaded", () => {
  const yearElement = document.querySelector("[data-current-year]");
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  }

  const revealElements = document.querySelectorAll(".reveal");
  if (revealElements.length > 0) {
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

  const forms = document.querySelectorAll(".needs-validation");
  forms.forEach((form) => {
    form.addEventListener("submit", (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add("was-validated");
    });
  });

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

  const parallaxLayer = document.querySelector("[data-parallax]");
  if (parallaxLayer) {
    window.addEventListener(
      "mousemove",
      (event) => {
        const x = (event.clientX / window.innerWidth - 0.5) * 12;
        const y = (event.clientY / window.innerHeight - 0.5) * 12;
        parallaxLayer.style.transform = `translate3d(${x}px, ${y}px, 0)`;
      },
      { passive: true },
    );
  }
});