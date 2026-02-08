(function () {
  const header = document.querySelector('.site-header');
  const navToggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.primary-nav');

  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    });
  }

  if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
      nav.classList.toggle('is-open');
    });
  }
})();
