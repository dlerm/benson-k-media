import Player from '@vimeo/player';

let player = false;
let activeVideo = false;

const bindModal = () => {
  const videoModal = document.getElementById('modal-video');
  document.querySelectorAll('[data-modal-open]').forEach((modalTrigger, index) => {
    const { video } = modalTrigger.dataset;
    if (!player && video) {
      player = new Player('modal-video', {
        id: video,
        width: 1024,
      });
      activeVideo = video;
    }
    modalTrigger.addEventListener('click', (event) => {
      if (activeVideo !== video) player.loadVideo(video).then(player.play);
      else player.play();
    })
  })

  document.querySelectorAll('[data-modal-close]').forEach((modalTrigger, index) => {
    modalTrigger.addEventListener('click', (event) => {
      if (!player) return;
      player.pause();
      player.setCurrentTime(0);
    })
  });
}

export default {
  bindModal,
};