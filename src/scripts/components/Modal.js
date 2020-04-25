import { player as modalVimeoPlayer, playerReset } from './Vimeo';

const TRANSITION_DURATION = 500;

const overlay = document.querySelector('[data-overlay]');

const open = (name) => {
  const modal = document.querySelector(`[data-modal="${name}"]`);
  if (!modal) return;
  modal.style.display = 'block';
  overlay.style.display = 'block';
  setTimeout(() => {
    modal.style.opacity = 1;
    overlay.style.opacity = 1;
  }, 10);
  modal.classList.add('is-active');
  document.body.setAttribute('modal-active', name);
};

const close = () => {
  const modal = document.querySelector(`[data-modal].is-active`);
  if (modal) {
    modal.style.opacity = 0;
    overlay.style.opacity = 0;
    modal.classList.remove('is-active');
    setTimeout(() => {
      modal.style.display = 'none';
      overlay.style.display = 'none';
    }, TRANSITION_DURATION);
  }
  document.body.removeAttribute('modal-active');
  if(modalVimeoPlayer) playerReset(modalVimeoPlayer);
};

const bind = () => {
  document.querySelectorAll('[data-modal-open]').forEach((modalTrigger) => {
    modalTrigger.addEventListener('click', (event) => open(event.currentTarget.dataset.modalOpen));
  });

  document.querySelectorAll('[data-modal-close]').forEach((modalTrigger) => {
    modalTrigger.addEventListener('click', close);
  });

  overlay.addEventListener('click', close);
};

export default {
  bind
};