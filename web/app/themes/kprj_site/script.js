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
      let isFlipping = false;
      let pendingIndex = 1;

      const renderMeta = (slide) => {
        townshipTitle.innerHTML = slide.title || '';
        townshipLocation.textContent = slide.location || '';
      };

      const runFlip = () => {
        if (isFlipping) {
          return;
        }

        isFlipping = true;
        pendingIndex = (activeIndex + 1) % slides.length;
        const nextSlide = slides[pendingIndex];

        townshipBack.src = nextSlide.image || '';
        townshipBack.alt = nextSlide.title || '';
        townshipStack.classList.add('is-flipping');
      };

      townshipBack.addEventListener('animationend', () => {
        if (!isFlipping) {
          return;
        }

        const nextSlide = slides[pendingIndex];
        townshipFront.src = nextSlide.image || '';
        townshipFront.alt = nextSlide.title || '';
        renderMeta(nextSlide);

        activeIndex = pendingIndex;
        isFlipping = false;
        townshipStack.classList.remove('is-flipping');
      });

      townshipViewport.addEventListener('click', runFlip);
      townshipNext.addEventListener('click', runFlip);
    }
  }
})();
