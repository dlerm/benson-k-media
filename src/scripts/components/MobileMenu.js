const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
const menu = document.getElementById('menu');
const menuScrollItems = menu.querySelectorAll('[data-scroll]');

const toggleMenu = () => {
  mobileMenuToggle.classList.toggle('is-active');
  menu.classList.toggle('is-active');
};

const closeMenu = () => {
  mobileMenuToggle.classList.remove('is-active');
  menu.classList.remove('is-active');
};

const bind = () => {
  mobileMenuToggle.addEventListener('click', toggleMenu);
  menuScrollItems.forEach(el => el.addEventListener('click', closeMenu));
};

export default {
  bind,
};
