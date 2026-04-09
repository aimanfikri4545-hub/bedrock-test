(() => {
  const body = document.body;
  const menuButton = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.site-nav');
  const heroSequence = document.querySelector('[data-hero-sequence]');
  const introPanel = heroSequence?.querySelector('[data-hero-panel="intro"]');
  const heroPanel = heroSequence?.querySelector('[data-hero-panel="hero"]');
  const whatWeDoSection = document.querySelector('#business-core');

  const markHeaderScrolled = () => {
    body.classList.toggle('is-scrolled', window.scrollY > 24);
  };

  markHeaderScrolled();
  window.addEventListener('scroll', markHeaderScrolled, { passive: true });

  if (heroSequence && introPanel && heroPanel && whatWeDoSection) {
    const stageClasses = ['hero-stage-hero', 'hero-stage-logo', 'hero-stage-complete'];

    const setHeroStage = (stageName) => {
      body.classList.remove(...stageClasses);
      body.classList.add(stageName);
    };

    const completeHeroSequence = (targetSection = whatWeDoSection) => {
      if (body.classList.contains('hero-stage-complete')) {
        return;
      }

      setHeroStage('hero-stage-complete');
      body.classList.remove('hero-sequence-active');
      window.setTimeout(() => {
        heroSequence.setAttribute('hidden', '');
        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 120);
    };

    const activateLogoStage = () => {
      if (body.classList.contains('hero-stage-hero')) {
        setHeroStage('hero-stage-logo');
      }
    };

    const handleSequenceKeydown = (event, callback) => {
      if (event.key !== 'Enter' && event.key !== ' ') {
        return;
      }

      event.preventDefault();
      callback();
    };

    setHeroStage('hero-stage-hero');
    body.classList.add('hero-sequence-active');

    heroPanel.addEventListener('click', (event) => {
      if (event.target.closest('a')) {
        return;
      }

      activateLogoStage();
    });

    heroPanel.addEventListener('keydown', (event) => {
      handleSequenceKeydown(event, activateLogoStage);
    });

    introPanel.addEventListener('click', () => {
      completeHeroSequence();
    });

    introPanel.addEventListener('keydown', (event) => {
      handleSequenceKeydown(event, () => completeHeroSequence());
    });

    nav?.querySelectorAll('a[href^="#"]').forEach((link) => {
      link.addEventListener('click', (event) => {
        const targetId = link.getAttribute('href');
        const targetSection = targetId ? document.querySelector(targetId) : null;

        if (!targetSection) {
          return;
        }

        if (!body.classList.contains('hero-stage-complete')) {
          event.preventDefault();
          completeHeroSequence(targetSection);
        }
      });
    });
  }

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
