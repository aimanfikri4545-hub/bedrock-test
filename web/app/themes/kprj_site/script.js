(() => {
  const menuButton = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.site-nav');

  if (menuButton && nav) {
    menuButton.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('is-open');
      menuButton.setAttribute('aria-expanded', String(isOpen));
    });
    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        nav.classList.remove('is-open');
        menuButton.setAttribute('aria-expanded', 'false');
      });
    });
  }

  const townshipStack = document.querySelector('.township-stack');
  const townshipViewport = document.querySelector('.township-viewport');
  const townshipFront = document.querySelector('.township-card-front');
  const townshipBack = document.querySelector('.township-card-back');
  const townshipTitle = document.querySelector('.township-title');
  const townshipLocation = document.querySelector('.township-location');
  const townshipNext = document.querySelector('.township-next');

  if (
    townshipStack &&
    townshipViewport &&
    townshipFront &&
    townshipBack &&
    townshipTitle &&
    townshipLocation &&
    townshipNext
  ) {
    let slides = [];
    try {
      slides = JSON.parse(townshipStack.dataset.townshipSlides || '[]');
    } catch (error) {
      slides = [];
    }

    if (slides.length > 1) {
      let activeIndex = 0;
      let isSliding = false;
      let pendingIndex = 1;

      const renderMeta = (slide) => {
        townshipTitle.innerHTML = slide.title || '';
        townshipLocation.textContent = slide.location || '';
      };

      const runSlide = () => {
        if (isSliding) {
          return;
        }

        isSliding = true;
        pendingIndex = (activeIndex + 1) % slides.length;
        const nextSlide = slides[pendingIndex];

        townshipBack.src = nextSlide.image || '';
        townshipBack.alt = nextSlide.title || '';
        townshipStack.classList.add('is-sliding');
      };

      townshipBack.addEventListener('animationend', () => {
        if (!isSliding) {
          return;
        }

        const nextSlide = slides[pendingIndex];
        townshipFront.src = nextSlide.image || '';
        townshipFront.alt = nextSlide.title || '';
        renderMeta(nextSlide);

        activeIndex = pendingIndex;
        isSliding = false;
        townshipStack.classList.remove('is-sliding');
      });

      townshipViewport.addEventListener('click', runSlide);
      townshipNext.addEventListener('click', runSlide);
    }
  }
})();
